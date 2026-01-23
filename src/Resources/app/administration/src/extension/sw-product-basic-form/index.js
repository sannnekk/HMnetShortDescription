import template from './sw-product-basic-form.html.twig'

const { mapPropertyErrors } = Shopware.Component.getComponentHelper()

Shopware.Component.override('sw-product-basic-form', {
	template,

	computed: {
		...mapPropertyErrors('product', [
			'extensions.hmnetShortDescription.shortDescription',
		]),

		shortDescriptionValue: {
			get() {
				if (!this.product?.extensions?.hmnetShortDescription) {
					return ''
				}
				return (
					this.product.extensions.hmnetShortDescription.shortDescription || ''
				)
			},
			set(value) {
				if (!this.product.extensions) {
					this.product.extensions = {}
				}
				if (!this.product.extensions.hmnetShortDescription) {
					this.product.extensions.hmnetShortDescription = {
						shortDescription: null,
					}
				}
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
})
