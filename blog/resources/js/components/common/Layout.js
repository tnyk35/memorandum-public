import React, { Component } from 'react';
import { Link, NavLink } from 'react-router-dom';

export default class Layout extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div id={this.props.pageId}>
        <div id="wrap">
          <header id="header">
            <h1 className="siteTitle">
              <Link to="/">
                <img src="/images/logo.png" alt="MemoRandum" width="151" />
              </Link>
            </h1>
            <nav id="gnav">
              <ul>
                <li className="ronde">
                  <NavLink to="/" exact>とっぷ</NavLink>
                </li>
                <li className="ronde">
                  <NavLink to="/about" exact>このサイトについて</NavLink>
                </li>
              </ul>
            </nav>
          </header>
          <div id="contents">
            {this.props.children}
          </div>
          <footer id="footer">
            <p id="copyright"><small>&copy; 2020 <a href="https://tnyk.jp/" target="_blank">Yuki Tani</a></small></p>
          </footer>
        </div>
      </div>
    );
  }
}