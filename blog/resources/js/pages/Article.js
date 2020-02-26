import React, { Component } from 'react';

import Layout from '../components/common/Layout';
import Axios from 'axios';

export default class Article extends Component {
  constructor(props) {
    super(props);
    this.state = {
      article: null
    }
  }

  async componentDidMount() {
    const url = '/api/articles/' + this.props.match.params.id;
    const article = await Axios.get(url);
    this.setState({
      article: article.data
    });
  }

  // 記事取得
  getArticle() {
    if (this.state.article !== null) {
      const article = this.state.article;

      return (
        <article key={article.id} className="article">
          <h2 className="articleTitle ronde">{article.title}</h2>
          <p className="articleDate ronde">{article.release_date}</p>
          <div className="articleBody" dangerouslySetInnerHTML={{__html: article.body}} />
        </article>
      );
    }
  }

  render() {
    return (
      <Layout pageId="article">
        {this.getArticle()}
      </Layout>
    );
  }
}