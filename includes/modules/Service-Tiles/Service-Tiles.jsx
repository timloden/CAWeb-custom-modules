// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class ServiceTiles extends Component {

	static slug = 'cacm_services_tiles';
	
	render() {

	    return (

			<Fragment>
				<div className="section-understated collapsed">
                	<div className="service-group clearfix">
						{this.props.content}
					</div>
				</div>
			</Fragment>
	    );
	}

}

export default ServiceTiles;
