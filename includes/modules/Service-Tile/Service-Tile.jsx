// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class ServiceTile extends Component {
	static slug = 'cacm_services_tile';

	renderTiles() {
		return (
            <div tabIndex={this.props.moduleInfo.order} className={"service-tile " + (this.props.tile_size)} data-tile-id={"panel-" + (this.props.moduleInfo.order)} style={{backgroundImage: "url(" + this.props.background + ")", backgroundCover: "cover"}}>
                <div className="teaser">
                    <h4 className="title">{this.props.title}</h4>
                </div>
            </div>
	    );

	}

	renderPanels() {
		return (
            <div className="service-tile-panel" data-tile-id={"panel-" + (this.props.moduleInfo.order)}>
                <div className="section section-default">
                    <div className="container" style={{paddingTop: 0}}>
                        <div className="card card-block">
                            <button type="button" className="close btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div className="group">
                                <div className="two-thirds">
                                    <h1 className="m-y-0 ">{this.props.service_title}</h1>
                                    <p className="lead"><a href={this.props.service_link_url}>{this.props.service_link_text}</a></p>

                                    <div className="btn-row m-b">
                                        
                                    </div>

                                    <div className="location" itemScope itemType="http://schema.org/Organization">
                                        <meta itemProp="name" content={this.props.service_title} />
                                        <p className="other">
                                            {this.props.content()}
                                        </p>
                                    </div>

                                    <div className="related-services m-t btn-row">
                                    	
                                    </div>

                                    
                                </div>

                                <div className="third text-center">
                                    <img src="" className="img-responsive m-t-md hidden-xs" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    );
	}

	renderFinal() {
		return (
			<Fragment>
				{this.renderTiles()}
	    		{this.renderPanels()}
	    	</Fragment>
		);
	}

	render() {
	    return (
	    	<Fragment>
	    		{this.renderFinal()}
			</Fragment>
	    );
	}
}

export default ServiceTile;
