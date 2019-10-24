import React, {Component} from 'react';
import { MDBDataTable } from 'mdbreact';

export default class DatatablePage extends Component {
  constructor(props){
    super(props);
  }
  render(){
      return (
        <MDBDataTable
          striped
          bordered
          hover
          data={this.props.data}
          key='name'
        />
      );
  }
}