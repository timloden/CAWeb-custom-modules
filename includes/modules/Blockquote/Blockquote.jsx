// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class Blockquote extends Component {

	static slug = 'cacm_blockquote';

	render() {
	    return (
			<Fragment>
				<blockquote className={"" + (this.props.text_align === 'right' ? 'blockquote-reverse' : '')}>
	                {this.props.content()}
                    <footer>
                    	{this.props.name} in <cite>{this.props.source}</cite>
                    </footer>
	            </blockquote>
	      	</Fragment>
	    );
	}

}

export default Blockquote;
