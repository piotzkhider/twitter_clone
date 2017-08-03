
/**
 * 最初にこのプロジェクトのJavascriptの依存パッケージを全てロードします。
 * これはVueと他のライブラリも含まれます。堅牢でパワフルな
 * アプリケーション構築の素晴らしいスタート地点となるでしょう。
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * 次に、真新しいVueアプリケーションのインスタンスを生成し、
 * ページヘアタッチします。それから、このアプリケーションにコンポーネントを追加するか
 * 皆さんの要求に合わせて、JacaScriptのスカフォールドをカスタマイズしてください。
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
