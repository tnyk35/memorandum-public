import React, { Component } from 'react';

import Layout from '../components/common/Layout';
import ArticleItem from '../components/ArticleItem';
import Pagination from '../components/Pagination';
import Axios from 'axios';

export default class Home extends Component {
  constructor(props) {
    super(props);

    this.state = {
      articles: null,
      currentPage: 0
    }
  }

  // ページングごとの記事を取得
  getArticlesPerPages() {
    const paged = this.props.match.params.paged;
    this._getArticles(paged);
  }

  // 記事を取得
  async _getArticles(page = 1) {
    if (page !== this.state.currentPage) {
      const url = '/api/articles?page=' + page;
      const articles = await Axios.get(url);
      this.setState({
        articles: articles.data,
        currentPage: page
      });
    }
  }

  render() {
    this.getArticlesPerPages();
    return (
      <Layout pageId="home">
        <ArticleItem articles={this.state.articles} />
        <Pagination articles={this.state.articles} paging={this.bindPaging} />
      </Layout>
    );
  }
}