import React, { Component } from 'react'
import { ProgressBar } from 'react-bootstrap';
import { Link } from 'react-router-dom';
import axios from 'axios';

export class GetCustomer extends Component {

  state = {
    customers: [],
    loading: true
  }
  // It is called after render because the component is already placed in the DOM
  async componentDidMount() {
    const res = await axios.get('http://localhost:8000/api/ViewCustomers')
    // console.log(res.data.customers);
    this.setState({
      customers: res.data.customers,
      loading: false
    });
  }


  render() {
    let customers_TABLE = "";
    if (this.state.loading) {
      customers_TABLE = <tr><td colSpan="10"><div className='spinner-grow text-success' role='status'>
        <span className='sr-only'>Loading...</span></div></td></tr>
    } else {
      customers_TABLE = this.state.customers.map((c) => {
        return (
          <tr key={c.cust_id}>
            <td>{c.photo}</td>
            <td>{c.first_name}</td>
            <td>{c.last_name}</td>
            <td>{c.father_name}</td>
            <td>{c.tazkira_ID}</td>
            <td>{c.contact_NO}</td>
            <td>{c.email}</td>
            <td>{c.address}</td>
            <td>
              <Link to={`editCustomer/${c.cust_id}`}><i className="mdi mdi-pencil-box"></i></Link>
            </td>
            <td>
              <Link to={`deleteCustomer/${c.cust_id}`}><i className="mdi mdi-delete" style={{ color: "red" }}></i></Link>
            </td>
          </tr>
        )
      });
    }

    return (
      <div>
        <div className="row">
          <div className="col-md-12 grid-margin stretch-card">
            <div className="card">
              <div className="card-body">
                <Link to={'new-customer'} className="btn btn-gradient-info btn-sm float-right">
                  <i className="mdi mdi-account-plus"></i>
                  New Customer
                </Link>
                <h4 className="card-title">Customers</h4>
                <p className="card-description">
                  These are the registered customers
                </p>
                <div className="table-responsive">
                  <table className="table table-striped">
                    <thead>
                      <tr>
                        <th> Customer </th>
                        <th> First Name </th>
                        <th> Last Name </th>
                        <th> Father Name </th>
                        <th> Tazkira ID </th>
                        <th> Contact NO </th>
                        <th> Email </th>
                        <th> Full Address </th>
                        <th> Edit </th>
                        <th> Delete </th>
                      </tr>
                    </thead>
                    <tbody>
                      {customers_TABLE}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default GetCustomer
