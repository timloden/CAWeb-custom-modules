// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class AccordionItem extends Component {
	static slug = 'cacm_accordion_item';

	render() {
	    return (
	    	<Fragment>
				<div className="panel panel-default">
                    <div className="panel-heading" role="tab" id={"heading" + (this.props.item_id)}>
                        <h4 className="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="accordion" href={"#" + (this.props.collapse_id)} aria-expanded="true" aria-controls={this.props.collapse_id}>{this.props.title}</a>
                        </h4>
                    </div>
                    <div id={this.props.collapse_id} className="panel-collapse collapse in" role="tabpanel" aria-labelledby={"heading" + (this.props.item_id)}>
                        <div className="panel-body">
                            {this.props.content}
                        </div>
                    </div>
                </div>
			</Fragment>
	    );
	}
}

export default AccordionItem;
