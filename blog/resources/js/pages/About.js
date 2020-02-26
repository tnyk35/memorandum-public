import React, { Component } from 'react';

import Layout from '../components/common/Layout';

export default class About extends Component {
  render() {
    return (
      <Layout pageId="about">
        <div className="articleBody u-mt0">
          <h2>このサイトについて</h2>
          <p>MemoRandum（メモランダム）は、React+Laravelの勉強がてら作成しました。</p>
          <p>日々気になったことや、感じたこと、考えたこと、覚えておきたいことを書いていくメモブログです。<br />ライトに書いていくためWysiwygエディタなどは入れずにマークダウン記法のみの対応としました。</p>
          <p>技術系の記事が読みたい場合は<a href="https://tnyk.jp/blog/" target="_blank">ウェブスタジオTANIのblog</a>にまとめてありますので、こちらを御覧ください。</p>
          <p>なにかありましたらお気軽にTwitter（<a href="https://twitter.com/tnyk0305" target="_blank">@tnyk0305</a>）のDMや以下サイトのお問合せにてご連絡くださいませ。</p>
          <ul>
            <li>ポートフォリオ<br />→<a href="https://portfolio.tnyk.jp/" target="_blank">https://portfolio.tnyk.jp/</a></li>
            <li>ウェブスタジオTANI<br />→<a href="https://tnyk.jp/" target="_blank">https://tnyk.jp/</a></li>
          </ul>

        </div>
      </Layout>
    );
  }
}