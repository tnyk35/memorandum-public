import React, { Component } from 'react';
import Axios from 'axios';
import { Redirect } from 'react-router-dom';

export default class Form extends Component {
  constructor(props) {
    super(props);
    this.state = {
      isError: false,
    };
  }

  async handleSubmit(e) {
    e.preventDefault();
    const email = e.target.email.value;
    const password = e.target.password.value;

    Axios.post('/api/auth/login', {
      email: email,
      password: password,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).then(res => {
      console.log(res);
      // ローカルストレージに保存はセキュリティ的にNG、DB保存＋httponlyでcookieを読み込まれないようにするしかない
      // react routerでリダイレクトをかける
    }).catch(err => {
      console.log(err);
    });
  }

  render() {
    return (
      <form onSubmit={this.handleSubmit}>
        <div>ID: <input type="text" name="email" required /></div>
        <div>PW: <input type="password" name="password" required /></div>
        <div><button type="submit" className="btn">ログイン</button></div>
      </form>
    );
  }
}