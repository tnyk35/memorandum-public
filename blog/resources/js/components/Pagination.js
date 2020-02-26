import React, { Component } from 'react';
import { Link, NavLink } from 'react-router-dom';

export default class Pagination extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    if (this.props.articles === null) {
      return null;
    }
    const items = [];
    const articles = this.props.articles;
    for (let i = 1; i <= articles.last_page; i++) {
      const active = (i === articles.current_page ? 'active' : null)
      items.push(
        <li key={i}>
          <Link className={"btn " + active} to={'/page/' + i}>{i}</Link>
        </li>
      );
    }
    return (
      <ul className="paging">{items}</ul>
    );
  }
}