// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class FigureCaption extends Component {

	static slug = 'cacm_figure_caption';

	render() {
	    return (
			<Fragment>
				<figure itemscope itemtype="http://schema.org/CreativeWork">
	                <img alt="" src={this.props.image} />
	                <figcaption itemprop="description">
	                    <strong>{ this.props.caption_title }</strong>
	                     { this.props.content() }
	                </figcaption>
            	</figure>
	      	</Fragment>
	    );
	}

}

export default FigureCaption;
