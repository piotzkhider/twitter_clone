
window._ = require('lodash');

/**
 * モーダルやタブのような基本的なBootstrap機能をサポートしている
 * jQueryとBootstrap jQueryプラグインをロードします。このコードは
 * アプリケーション独自の必要に応じて、変更されることになります。
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

/**
 * Laravelのバックエンドにリクエストを簡単に発行できるように、axios HTTP
 * ライブラリをロードします。このライブラリは自動的に"XSRF"トークン
 * クッキーの値に基づいて、ヘッダーベースのCSRFトークンを送ります。
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echoはチャンネルを購入したり、Laravelによりブロードキャストされるイベントをリスニング
 * するための、記述的なAPIを提供しています。Echoとイベントブロードキャストにより、
 * あなたのチームは堅牢なリアルタイムWebアプリを簡単に構築できるでしょう。
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
