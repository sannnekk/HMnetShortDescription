import template from './sw-product-basic-form.html.twig'

const { mapPropertyErrors } = Shopware.Component.getComponentHelper()

Shopware.Component.override('sw-product-basic-form', {
	template,

	inject: ['repositoryFactory', 'feature'],

	computed: {
		...mapPropertyErrors('product', [
			'extensions.hmnetShortDescription.shortDescription',
		]),

		shortDescriptionRepository() {
			return this.repositoryFactory.create('hmnet_short_description')
		},

		shortDescriptionValue: {
			get() {
				return (
					this.product?.extensions?.hmnetShortDescription?.shortDescription ||
					''
				)
			},
			set(value) {
				this.ensureShortDescriptionEntity()
				this.product.extensions.hmnetShortDescription.shortDescription = value
			},
		},

		shortDescriptionError() {
			const value = this.shortDescriptionValue
			if (value && value.length > 1000) {
				return {
					code: 'HMNET_SHORT_DESCRIPTION_TOO_LONG',
					detail: this.$tc('hmnet-short-description.product.errorTooLong'),
				}
			}
			return null
		},
	},

	methods: {
		ensureShortDescriptionEntity() {
			if (!this.product) {
				return
			}
			if (!this.product.extensions) {
				this.product.extensions = {}
			}
			if (!this.product.extensions.hmnetShortDescription) {
				const entity = this.shortDescriptionRepository.create(
					Shopware.Context.api,
				)
				entity.productId = this.product.id
				entity.productVersionId =
					this.product.versionId || Shopware.Context.api.versionId
				this.product.extensions.hmnetShortDescription = entity
			}
		},
	},
})
