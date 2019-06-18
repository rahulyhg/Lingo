<?php
namespace ZbynekRybicka;

require __DIR__ . '/../../../../vendor/autoload.php';

use \Mustache_Engine;

function JulieFrontEnd($data) {

	$template = '// Julie automatic generated file
const state = {
	ajax: { 
		options: {},
		apiUrl: "http://localhost:9601",
		err: null,
		preloader: 0,
	}
}
{{#store}}
DotObject.str("{{.}}", "", state);
{{/store}}

const store = new Vuex.Store({
	state,
	mutations: {
{{#mutations}}
		"{{title}}": (state, item) => {
{{#content}}
{{#ajax}}			state.ajax.preloader++
			const options = Object.assign({}, state.ajax.options)
			$.ajax({ 
				method: "{{method}}", 
				url: `${state.ajax.apiUrl}{{url}}`,{{#body
}}				data: state.{{.}}{{/body}},
				headers: state.ajax.options.headers
			}).done(res => {
{{#then}}
				state.{{state}} = {{{value}}}
{{/then}}
			}).fail(err => {
				state.ajaxErr = err
			}).always(() => {
				state.ajax.preloader--
			})
{{/ajax}}
{{#set}}
			state.{{state}} = {{{value}}}
{{/set}}
{{/content}}
		},
{{/mutations}}
	}
})

{{#templates}}
Vue.component(`{{title}}`, {
	store: store,
	data: function() {
		return {
{{#state}}
			{{key}}: {{value}},
{{/state}}			
		}
	},
	props: [ "item" ],
	template: `<span><{{root}}{{#rootAttributes}} {{key}}="{{{value}}}"{{/rootAttributes}}>
{{#content}}
	<{{tag}}{{#attributes}} {{key}}="{{{value}}}"{{/attributes}} />
{{/content}}
</{{root}}></span>`,
})

{{/templates}}

const VueApp = new Vue({ el: "#app", store });
';

	$e = new Mustache_Engine();
	file_put_contents( __DIR__ . '/app.js', $e->render($template, $data));

}

$function = '\ZbynekRybicka\JulieFrontEnd';
