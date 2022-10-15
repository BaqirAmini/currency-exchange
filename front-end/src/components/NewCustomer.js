import React, { Component } from 'react';
import { Form } from 'react-bootstrap';
import axios from 'axios';
import swal from 'sweetalert';

class NewCustomer extends Component {

  state = {
    firstName: '',
    lastName: '',
    fatherName: '',
    tazkira_number: '',
    contact_number: '',
    photo: '',
    email: '',
    address: '',
    error_list: []
  }

  handleInput = (e) => {
    this.setState({
      [e.target.name]: e.target.value
    });
  }

  saveCustomer = async (e) => {
    e.preventDefault();

    let data = JSON.stringify(this.state);
    const res = await axios.post(`http://localhost:8000/api/AddCustomer`, data, { headers: { "Content-Type": "application/json" } });

    if (res.data.status === 200) {
      swal({
        title: "Success!",
        text: "The customer added!",
        icon: "success",
        button: "OK"
      });
      this.setState({
        firstName: '',
        lastName: '',
        fatherName: '',
        tazkira_number: '',
        contact_number: '',
        photo: '',
        email: '',
        address: ''
      });
    } else {
      this.setState({
        error_list: res.data.validation_err
      });
    }

  }

  render() {
    return (
      <div>
        <div className="row">
          <div className="col-12 grid-margin stretch-card">
            <div className="card">
              <div className="card-body">
                <h4 className="card-title">Add New Customers</h4>
                <p className="card-description"> Fill in the textboxes below to add a new customer </p>
                <form className="forms-sample" onSubmit={this.saveCustomer}>
                  <Form.Group>
                    <label htmlFor="first_name">First Name</label>
                    <Form.Control type="text" name="firstName" value={this.state.firstName} onChange={this.handleInput} className={(this.state.error_list.firstName ? 'is-invalid' : '')} id="cust_first_name" placeholder="First Name" />
                    <div className='invalid-feedback'>{this.state.error_list.firstName}</div>
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="last_name">Last Name</label>
                    <Form.Control type="text" name="lastName" value={this.state.lastName} onChange={this.handleInput} className={(this.state.error_list.lastName ? 'is-invalid' : '')} id="cust_last_name" placeholder="Last Name" />
                    <div className='invalid-feedback'>{this.state.error_list.lastName}</div>
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="father_name">Father Name</label>
                    <Form.Control type="text" name="fatherName" value={this.state.fatherName} onChange={this.handleInput} className={(this.state.error_list.fatherName ? 'is-invalid' : '')} id="cust_father_name" placeholder="Father Name" />
                    <div className='invalid-feedback'>{this.state.error_list.fatherName}</div>
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="tazkira_ID">Tazkira ID</label>
                    <Form.Control type="number" name="tazkira_number" value={this.state.tazkira_number} onChange={this.handleInput} className={(this.state.error_list.tazkira_number ? 'is-invalid' : '')} id="cust_tazkira_ID" placeholder="Tazkira ID" />
                    <div className='invalid-feedback'>{this.state.error_list.tazkira_number}</div>
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="contact_no">Contact NO</label>
                    <Form.Control type="number" name="contact_number" value={this.state.contact_number} onChange={this.handleInput} className={(this.state.error_list.contact_number ? 'is-invalid' : '')} id="cust_contact_no" placeholder="Contact NO" />
                    <div className='invalid-feedback'>{this.state.error_list.contact_number}</div>
                  </Form.Group>
                  <Form.Group>
                    <label>File upload</label>
                    <div className="custom-file">
                      <Form.Control type="file" name="photo" value={this.state.photo} onChange={this.handleInput} className="visibility-hidden" id="customFileLang" lang="es" />
                      <label className="custom-file-label" htmlFor="customFileLang">Upload image</label>
                    </div>
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="email">Email address</label>
                    <Form.Control type="email" name="email" value={this.state.email} onChange={this.handleInput} className={(this.state.error_list.email ? 'is-invalid' : '')} id="cust_email" placeholder="Email" />
                    <div className='invalid-feedback'>{this.state.error_list.email}</div>
                  </Form.Group>
                  {/* <Form.Group>
                      <label htmlFor="gender">Gender</label>
                      <select className={(this.state.isBlank ? 'is-invalid' : '')} id="cust_gender">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </Form.Group> */}
                  {/* <Form.Group>
                      <label htmlFor="exampleInputCity1">City</label>
                      <Form.Control type="text" className={(this.state.isBlank ? 'is-invalid' : '')} id="exampleInputCity1" placeholder="Location" />
                    </Form.Group> */}
                  <Form.Group>
                    <label htmlFor="address">Address</label>
                    <textarea className={"form-control " + (this.state.error_list.address ? 'is-invalid' : '')} name="address" value={this.state.address} onChange={this.handleInput} id="cust_address" rows="4"></textarea>
                    <div className='invalid-feedback'>{this.state.error_list.address}</div>
                  </Form.Group>
                  <button type="submit" className="btn btn-gradient-primary">Save</button>
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



export default NewCustomer