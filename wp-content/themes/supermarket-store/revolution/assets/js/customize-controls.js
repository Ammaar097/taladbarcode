( function( api ) {

	// Extends our custom "supermarket-store" section.
	api.sectionConstructor['supermarket-store'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );