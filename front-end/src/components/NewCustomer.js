import React, { Component } from 'react'
import { Form } from 'react-bootstrap'


export class BasicTable extends Component {
  render() {
    return (
      <div>
        <div className="row">
          <div className="col-12 grid-margin stretch-card">
            <div className="card">
              <div className="card-body">
                <h4 className="card-title">Add New Customers</h4>
                <p className="card-description"> Fill in the textboxes below to add a new customer </p>
                <form className="forms-sample">
                  <Form.Group>
                    <label htmlFor="first_name">First Name</label>
                    <Form.Control type="text" className="form-control" id="cust_first_name" placeholder="First Name" />
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="last_name">Last Name</label>
                    <Form.Control type="text" className="form-control" id="cust_last_name" placeholder="Last Name" />
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="father_name">Father Name</label>
                    <Form.Control type="text" className="form-control" id="cust_father_name" placeholder="Father Name" />
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="tazkira_ID">Tazkira ID</label>
                    <Form.Control type="number" className="form-control" id="cust_tazkira_ID" placeholder="Tazkira ID" />
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="contact_no">Contact NO</label>
                    <Form.Control type="number" className="form-control" id="cust_contact_no" placeholder="Contact NO" />
                  </Form.Group>
                  <Form.Group>
                    <label>File upload</label>
                    <div className="custom-file">
                      <Form.Control type="file" className="form-control visibility-hidden" id="customFileLang" lang="es"/>
                      <label className="custom-file-label" htmlFor="customFileLang">Upload image</label>
                    </div>
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="email">Email address</label>
                    <Form.Control type="email" className="form-control" id="cust_email" placeholder="Email" />
                  </Form.Group>
                  {/* <Form.Group>
                    <label htmlFor="gender">Gender</label>
                    <select className="form-control" id="cust_gender">
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </Form.Group> */}
                  {/* <Form.Group>
                    <label htmlFor="exampleInputCity1">City</label>
                    <Form.Control type="text" className="form-control" id="exampleInputCity1" placeholder="Location" />
                  </Form.Group> */}
                  <Form.Group>
                    <label htmlFor="address">Address</label>
                    <textarea className="form-control" id="cust_address" rows="4"></textarea>
                  </Form.Group>
                  <button type="submit" className="btn btn-gradient-primary">Submit</button>
                  <button className="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default BasicTable
