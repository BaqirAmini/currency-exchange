import axios from "axios";
import React, { Component } from "react";
import { Form } from "react-bootstrap";
import { Link } from "react-router-dom";
import swal from "sweetalert";

class EditCustomer extends Component {

  // When insert into input elements, those values are assigned here.
  state = {
    firstName: '',
    lastName: '',
    fatherName: '',
    tazkiraID: '',
    contactNO: '',
    photo: '',
    email: '',
  }

  handleInput = (e) => {
    this.setState({
      [e.target.name]: e.target.value
    })
  }

  // When the form is submitted, this function is called.
  editCustomer = async (e) => {
    e.preventDefault();
    const cid = this.props.match.params.cid
    const res = await axios.put(`http://localhost:8000/api/editCustomer/${cid}`, this.state);
    if (res.data.status === 200) {
        swal({
          title: "Good Job!",
          text: "The customer has been updated successfully!",
          icon: "success",
          button: "OK"
        });

    } else {
      console.log("Sorry, an error occured!");
    }


  }

  async componentDidMount() {
    const custID = this.props.match.params.cid;
    const res = await axios.get(`http://localhost:8000/api/editCustomer/${custID}`);
    const custData = res.data.customer;
    if (res.data.status === 200) {

      this.setState(
        {
          firstName: custData.first_name,
          lastName: custData.last_name,
          fatherName: custData.father_name,
          tazkiraID: custData.tazkira_ID,
          contactNO: custData.contact_NO,
          email: custData.email,
          address: custData.address
        }
      );
    } else {
      alert("Sorry, no customer found!");
    }
  }

  render() {
    return (
      <div>
        <div className="row">
          <div className="col-12 grid-margin stretch-card">
            <div className="card">
              <div className="card-body">
                <h4 className="card-title">Edit Customers</h4>
                <p className="card-description"> Fill in the textboxes below to add a new customer </p>
                <form className="forms-sample" onSubmit={this.editCustomer}>
                  <Form.Group>
                    <label htmlFor="first_name">First Name</label>
                    <Form.Control type="text" name="firstName" value={this.state.firstName} onChange={this.handleInput} className="form-control" id="cust_first_name" placeholder="First Name" />
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="last_name">Last Name</label>
                    <Form.Control type="text" name="lastName" value={this.state.lastName} onChange={this.handleInput} className="form-control" id="cust_last_name" placeholder="Last Name" />
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="father_name">Father Name</label>
                    <Form.Control type="text" name="fatherName" value={this.state.fatherName} onChange={this.handleInput} className="form-control" id="cust_father_name" placeholder="Father Name" />
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="tazkira_ID">Tazkira ID</label>
                    <Form.Control type="number" name="tazkiraID" value={this.state.tazkiraID} onChange={this.handleInput} className="form-control" id="cust_tazkira_ID" placeholder="Tazkira ID" />
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="contact_no">Contact NO</label>
                    <Form.Control type="number" name="contactNO" value={this.state.contactNO} onChange={this.handleInput} className="form-control is-invalid" id="cust_contact_no" placeholder="Contact NO" />
                    <div className="invalid-feedback">
                      Please provide a valid Tazkira ID.
                    </div>
                  </Form.Group>
                  <Form.Group>
                    <label>File upload</label>
                    <div className="custom-file">
                      <Form.Control type="file" name="photo" value={this.state.photo} onChange={this.handleInput} className="form-control visibility-hidden" id="customFileLang" lang="es" />
                      <label className="custom-file-label" htmlFor="customFileLang">Upload image</label>
                    </div>
                  </Form.Group>
                  <Form.Group>
                    <label htmlFor="email">Email address</label>
                    <Form.Control type="email" name="email" value={this.state.email} onChange={this.handleInput} className="form-control" id="cust_email" placeholder="Email" />
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
                    <textarea className="form-control" name="address" value={this.state.address} onChange={this.handleInput} id="cust_address" rows="4"></textarea>
                  </Form.Group>
                  <button type="submit" id="btn_update_cust" className="btn btn-gradient-primary">Update</button>
                  <Link to={'/customers'} className="btn btn-light">
                    Cancel
                  </Link>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default EditCustomer