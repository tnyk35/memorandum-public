import React, { Component } from 'react';

import Layout from '../components/common/Layout';
import LoginForm from '../components/login/Form';

export default class Login extends Component {
  render() {
    return (
      <Layout pageId="login">
        <LoginForm />
      </Layout>
    );
  }
}