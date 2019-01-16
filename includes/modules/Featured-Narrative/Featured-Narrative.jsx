// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class FeaturedNarrative extends Component {

	static slug = 'cacm_featured_narrative';

	render() {
	    return (
			<Fragment>
				<aside class="featured-narrative">	
	                <strong>{ this.props.title }</strong>
	                { this.props.content() }
	            </aside>
	      	</Fragment>
	    );
	}

}

export default FeaturedNarrative;
