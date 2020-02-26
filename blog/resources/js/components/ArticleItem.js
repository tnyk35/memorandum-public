import React, { Component } from 'react';
import { Link } from 'react-router-dom';

export default class ArticleItem extends Component {
  constructor(props) {
    super(props);
  }
  
  render() {
    if (this.props.articles === null) {
      return null;
    }
    return (
      this.props.articles.data.map(article => (
        <article key={article.id} className="article">
          <Link to={'/article/' + article.url}>
            <h2 className="articleTitle ronde">{article.title}</h2>
            <p className="articleDate ronde">{article.release_date}</p>
          </Link>
        </article>
      ))
    );
  }
}