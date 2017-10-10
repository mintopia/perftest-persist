<!DOCTYPE html><html><head><meta charset="utf-8"><title>Performance Testing Persistance API</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><style>@import url('https://fonts.googleapis.com/css?family=Roboto:400,700|Inconsolata|Raleway:200');.hljs-comment,.hljs-title{color:#8e908c}.hljs-variable,.hljs-attribute,.hljs-tag,.hljs-regexp,.ruby .hljs-constant,.xml .hljs-tag .hljs-title,.xml .hljs-pi,.xml .hljs-doctype,.html .hljs-doctype,.css .hljs-id,.css .hljs-class,.css .hljs-pseudo{color:#c82829}.hljs-number,.hljs-preprocessor,.hljs-pragma,.hljs-built_in,.hljs-literal,.hljs-params,.hljs-constant{color:#f5871f}.ruby .hljs-class .hljs-title,.css .hljs-rules .hljs-attribute{color:#eab700}.hljs-string,.hljs-value,.hljs-inheritance,.hljs-header,.ruby .hljs-symbol,.xml .hljs-cdata{color:#718c00}.css .hljs-hexcolor{color:#3e999f}.hljs-function,.python .hljs-decorator,.python .hljs-title,.ruby .hljs-function .hljs-title,.ruby .hljs-title .hljs-keyword,.perl .hljs-sub,.javascript .hljs-title,.coffeescript .hljs-title{color:#4271ae}.hljs-keyword,.javascript .hljs-function{color:#8959a8}.hljs{display:block;background:white;color:#4d4d4c;padding:.5em}.coffeescript .javascript,.javascript .xml,.tex .hljs-formula,.xml .javascript,.xml .vbscript,.xml .css,.xml .hljs-cdata{opacity:.5}.right .hljs-comment{color:#969896}.right .css .hljs-class,.right .css .hljs-id,.right .css .hljs-pseudo,.right .hljs-attribute,.right .hljs-regexp,.right .hljs-tag,.right .hljs-variable,.right .html .hljs-doctype,.right .ruby .hljs-constant,.right .xml .hljs-doctype,.right .xml .hljs-pi,.right .xml .hljs-tag .hljs-title{color:#c66}.right .hljs-built_in,.right .hljs-constant,.right .hljs-literal,.right .hljs-number,.right .hljs-params,.right .hljs-pragma,.right .hljs-preprocessor{color:#de935f}.right .css .hljs-rule .hljs-attribute,.right .ruby .hljs-class .hljs-title{color:#f0c674}.right .hljs-header,.right .hljs-inheritance,.right .hljs-name,.right .hljs-string,.right .hljs-value,.right .ruby .hljs-symbol,.right .xml .hljs-cdata{color:#b5bd68}.right .css .hljs-hexcolor,.right .hljs-title{color:#8abeb7}.right .coffeescript .hljs-title,.right .hljs-function,.right .javascript .hljs-title,.right .perl .hljs-sub,.right .python .hljs-decorator,.right .python .hljs-title,.right .ruby .hljs-function .hljs-title,.right .ruby .hljs-title .hljs-keyword{color:#81a2be}.right .hljs-keyword,.right .javascript .hljs-function{color:#b294bb}.right .hljs{display:block;overflow-x:auto;background:#1d1f21;color:#c5c8c6;padding:.5em;-webkit-text-size-adjust:none}.right .coffeescript .javascript,.right .javascript .xml,.right .tex .hljs-formula,.right .xml .css,.right .xml .hljs-cdata,.right .xml .javascript,.right .xml .vbscript{opacity:.5}body{color:black;background:white;font:400 14px / 1.42 'Roboto',Helvetica,sans-serif}header{border-bottom:1px solid #ededed;margin-bottom:12px}h1,h2,h3,h4,h5{color:black;margin:12px 0}h1 .permalink,h2 .permalink,h3 .permalink,h4 .permalink,h5 .permalink{margin-left:0;opacity:0;transition:opacity .25s ease}h1:hover .permalink,h2:hover .permalink,h3:hover .permalink,h4:hover .permalink,h5:hover .permalink{opacity:1}.triple h1 .permalink,.triple h2 .permalink,.triple h3 .permalink,.triple h4 .permalink,.triple h5 .permalink{opacity:.15}.triple h1:hover .permalink,.triple h2:hover .permalink,.triple h3:hover .permalink,.triple h4:hover .permalink,.triple h5:hover .permalink{opacity:.15}h1{font:200 36px 'Raleway',Helvetica,sans-serif;font-size:36px}h2{font:200 36px 'Raleway',Helvetica,sans-serif;font-size:30px}h3{font-size:100%;text-transform:uppercase}h5{font-size:100%;font-weight:normal}p{margin:0 0 10px}p.choices{line-height:1.6}a{color:#18bc9c;text-decoration:none}li p{margin:0}hr.split{border:0;height:1px;width:100%;padding-left:6px;margin:12px auto;background-image:linear-gradient(to right, rgba(0,0,0,0) 20%, rgba(0,0,0,0.2) 51.4%, rgba(255,255,255,0.2) 51.4%, rgba(255,255,255,0) 80%)}dl dt{float:left;width:130px;clear:left;text-align:right;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-weight:700}dl dd{margin-left:150px}blockquote{color:rgba(0,0,0,0.5);font-size:15.5px;padding:10px 20px;margin:12px 0;border-left:5px solid #e8e8e8}blockquote p:last-child{margin-bottom:0}pre{background-color:#f5f5f5;padding:12px;border:1px solid #cfcfcf;border-radius:6px;overflow:auto}pre code{color:black;background-color:transparent;padding:0;border:none}code{color:#444;background-color:#f5f5f5;font:'Inconsolata',monospace;padding:1px 4px;border:1px solid #cfcfcf;border-radius:3px}ul,ol{padding-left:2em}table{border-collapse:collapse;border-spacing:0;margin-bottom:12px}table tr:nth-child(2n){background-color:#fafafa}table th,table td{padding:6px 12px;border:1px solid #e6e6e6}.text-muted{opacity:.5}.note,.warning{padding:.3em 1em;margin:1em 0;border-radius:2px;font-size:90%}.note h1,.warning h1,.note h2,.warning h2,.note h3,.warning h3,.note h4,.warning h4,.note h5,.warning h5,.note h6,.warning h6{font-family:200 36px 'Raleway',Helvetica,sans-serif;font-size:135%;font-weight:500}.note p,.warning p{margin:.5em 0}.note{color:black;background-color:#eff7fc;border-left:4px solid #3498db}.note h1,.note h2,.note h3,.note h4,.note h5,.note h6{color:#3498db}.warning{color:black;background-color:#fcf0ef;border-left:4px solid #d62c1a}.warning h1,.warning h2,.warning h3,.warning h4,.warning h5,.warning h6{color:#d62c1a}header{margin-top:24px}nav{position:fixed;top:24px;bottom:0;overflow-y:auto}nav .resource-group{padding:0}nav .resource-group .heading{position:relative}nav .resource-group .heading .chevron{position:absolute;top:12px;right:12px;opacity:.5}nav .resource-group .heading a{display:block;color:black;opacity:.7;border-left:2px solid transparent;margin:0}nav .resource-group .heading a:hover{text-decoration:none;background-color:bad-color;border-left:2px solid black}nav ul{list-style-type:none;padding-left:0}nav ul a{display:block;font-size:13px;color:rgba(0,0,0,0.7);padding:8px 12px;border-top:1px solid #ededed;border-left:2px solid transparent;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}nav ul a:hover{text-decoration:none;background-color:bad-color;border-left:2px solid black}nav ul>li{margin:0}nav ul>li:first-child{margin-top:-12px}nav ul>li:last-child{margin-bottom:-12px}nav ul ul a{padding-left:24px}nav ul ul li{margin:0}nav ul ul li:first-child{margin-top:0}nav ul ul li:last-child{margin-bottom:0}nav>div>div>ul>li:first-child>a{border-top:none}.preload *{transition:none !important}.pull-left{float:left}.pull-right{float:right}.badge{display:inline-block;float:right;min-width:10px;min-height:14px;padding:3px 7px;font-size:12px;color:#000;background-color:#ededed;border-radius:10px;margin:-2px 0}.badge.get{color:white;background-color:#3498db}.badge.head{color:white;background-color:#3498db}.badge.options{color:white;background-color:#3498db}.badge.put{color:white;background-color:#f39c12}.badge.patch{color:white;background-color:#f39c12}.badge.post{color:white;background-color:#18bc9c}.badge.delete{color:white;background-color:#e74c3c}.collapse-button{float:right}.collapse-button .close{display:none;color:#18bc9c;cursor:pointer}.collapse-button .open{color:#18bc9c;cursor:pointer}.collapse-button.show .close{display:inline}.collapse-button.show .open{display:none}.collapse-content{max-height:0;overflow:hidden;transition:max-height .3s ease-in-out}nav{width:220px}.container{max-width:940px;margin-left:auto;margin-right:auto}.container .row .content{margin-left:244px;width:696px}.container .row:after{content:'';display:block;clear:both}.container-fluid nav{width:22%}.container-fluid .row .content{margin-left:24%}.container-fluid.triple nav{width:16.5%;padding-right:1px}.container-fluid.triple .row .content{position:relative;margin-left:16.5%;padding-left:24px}.middle:before,.middle:after{content:'';display:table}.middle:after{clear:both}.middle{box-sizing:border-box;width:51.5%;padding-right:12px}.right{box-sizing:border-box;float:right;width:48.5%;padding-left:12px}.right a{color:#18bc9c}.right h1,.right h2,.right h3,.right h4,.right h5,.right p,.right div{color:white}.right pre{background-color:#1d1f21;border:1px solid #1d1f21}.right pre code{color:#c5c8c6}.right .description{margin-top:12px}.triple .resource-heading{font-size:125%}.definition{margin-top:12px;margin-bottom:12px}.definition .method{font-weight:bold}.definition .method.get{color:#2e80b8}.definition .method.head{color:#2e80b8}.definition .method.options{color:#2e80b8}.definition .method.post{color:#2eb89d}.definition .method.put{color:#b8822e}.definition .method.patch{color:#b8822e}.definition .method.delete{color:#b83b2e}.definition .uri{word-break:break-all;word-wrap:break-word}.definition .hostname{opacity:.5}.example-names{background-color:#eee;padding:12px;border-radius:6px}.example-names .tab-button{cursor:pointer;color:black;border:1px solid #ddd;padding:6px;margin-left:12px}.example-names .tab-button.active{background-color:#d5d5d5}.right .example-names{background-color:#444}.right .example-names .tab-button{color:white;border:1px solid #666;border-radius:6px}.right .example-names .tab-button.active{background-color:#5e5e5e}#nav-background{position:fixed;left:0;top:0;bottom:0;width:16.5%;padding-right:14.4px;background-color:#fbfbfb;border-right:1px solid #f0f0f0;z-index:-1}#right-panel-background{position:absolute;right:-12px;top:-12px;bottom:-12px;width:48.6%;background-color:#333;z-index:-1}@media (max-width:1200px){nav{width:198px}.container{max-width:840px}.container .row .content{margin-left:224px;width:606px}}@media (max-width:992px){nav{width:169.4px}.container{max-width:720px}.container .row .content{margin-left:194px;width:526px}}@media (max-width:768px){nav{display:none}.container{width:95%;max-width:none}.container .row .content,.container-fluid .row .content,.container-fluid.triple .row .content{margin-left:auto;margin-right:auto;width:95%}#nav-background{display:none}#right-panel-background{width:48.6%}}.back-to-top{position:fixed;z-index:1;bottom:0;right:24px;padding:4px 8px;color:rgba(0,0,0,0.5);background-color:#ededed;text-decoration:none !important;border-top:1px solid #ededed;border-left:1px solid #ededed;border-right:1px solid #ededed;border-top-left-radius:3px;border-top-right-radius:3px}.resource-group{padding:12px;margin-bottom:12px;background-color:white;border:1px solid #ededed;border-radius:6px}.resource-group h2.group-heading,.resource-group .heading a{padding:12px;margin:-12px -12px 12px -12px;background-color:#ededed;border-bottom:1px solid #ededed;border-top-left-radius:6px;border-top-right-radius:6px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}.triple .content .resource-group{padding:0;border:none}.triple .content .resource-group h2.group-heading,.triple .content .resource-group .heading a{margin:0 0 12px 0;border:1px solid #ededed}nav .resource-group .heading a{padding:12px;margin-bottom:0}nav .resource-group .collapse-content{padding:0}.action{margin-bottom:12px;padding:12px 12px 0 12px;overflow:hidden;border:1px solid transparent;border-radius:6px}.action h4.action-heading{padding:6px 12px;margin:-12px -12px 12px -12px;border-bottom:1px solid transparent;border-top-left-radius:6px;border-top-right-radius:6px;overflow:hidden}.action h4.action-heading .name{float:right;font-weight:normal;padding:6px 0}.action h4.action-heading .method{padding:6px 12px;margin-right:12px;border-radius:3px;display:inline-block}.action h4.action-heading .method.get{color:#000;background-color:white}.action h4.action-heading .method.head{color:#000;background-color:white}.action h4.action-heading .method.options{color:#000;background-color:white}.action h4.action-heading .method.put{color:#000;background-color:white}.action h4.action-heading .method.patch{color:#000;background-color:white}.action h4.action-heading .method.post{color:#000;background-color:white}.action h4.action-heading .method.delete{color:#000;background-color:white}.action h4.action-heading code{color:#444;background-color:rgba(255,255,255,0.7);border-color:transparent;font-weight:normal;word-break:break-all;display:inline-block;margin-top:2px}.action dl.inner{padding-bottom:2px}.action .title{border-bottom:1px solid white;margin:0 -12px -1px -12px;padding:12px}.action.get{border-color:#3498db}.action.get h4.action-heading{color:white;background:#3498db;border-bottom-color:#3498db}.action.head{border-color:#3498db}.action.head h4.action-heading{color:white;background:#3498db;border-bottom-color:#3498db}.action.options{border-color:#3498db}.action.options h4.action-heading{color:white;background:#3498db;border-bottom-color:#3498db}.action.post{border-color:#18bc9c}.action.post h4.action-heading{color:white;background:#18bc9c;border-bottom-color:#18bc9c}.action.put{border-color:#f39c12}.action.put h4.action-heading{color:white;background:#f39c12;border-bottom-color:#f39c12}.action.patch{border-color:#f39c12}.action.patch h4.action-heading{color:white;background:#f39c12;border-bottom-color:#f39c12}.action.delete{border-color:#e74c3c}.action.delete h4.action-heading{color:white;background:#e74c3c;border-bottom-color:#e74c3c}</style></head><body class="preload"><div id="nav-background"></div><div class="container-fluid triple"><div class="row"><nav><div class="resource-group"><div class="heading"><div class="chevron"><i class="open fa fa-angle-down"></i></div><a href="#top">Overview</a></div><div class="collapse-content"><ul><li><a href="#header-pagination">Pagination</a></li></ul></div></div><div class="resource-group"><div class="heading"><div class="chevron"><i class="open fa fa-angle-down"></i></div><a href="#miscellaneous-methods">Miscellaneous Methods</a></div><div class="collapse-content"><ul><li><a href="#miscellaneous-methods-ping-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Ping</a></li></ul></div></div><div class="resource-group"><div class="heading"><div class="chevron"><i class="open fa fa-angle-down"></i></div><a href="#data">Data</a></div><div class="collapse-content"><ul><li><a href="#data-data">Data</a><ul><li><a href="#data-data-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>List Data</a></li><li><a href="#data-data-post"><span class="badge post"><i class="fa fa-plus"></i></span>Create Data</a></li></ul></li><li><a href="#data-data-1">Data</a><ul><li><a href="#data-data-get-1"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Get Data</a></li><li><a href="#data-data-put"><span class="badge put"><i class="fa fa-pencil"></i></span>Update Data</a></li><li><a href="#data-data-delete"><span class="badge delete"><i class="fa fa-times"></i></span>Delete Data</a></li></ul></li></ul></div></div><p style="text-align: center; word-wrap: break-word;"><a href="https://perftest">https://perftest</a></p></nav><div class="content"><div id="right-panel-background"></div><div class="middle"><header><h1 id="top">Performance Testing Persistance API</h1></header></div><div class="right"><h5>API Endpoint</h5><a href="https://perftest">https://perftest</a></div><div class="middle"><p>This is a REST API for testing persistent storage and storting data externally.</p>
<ul>
<li>
<p><strong>Version:</strong> 1.0.0</p>
</li>
<li>
<p><strong>Author:</strong> Jessica Smith &lt;<a href="mailto:jessica.smith@fasthosts.com">jessica.smith@fasthosts.com</a>&gt;</p>
</li>
</ul>
<h2 id="header-pagination">Pagination <a class="permalink" href="#header-pagination" aria-hidden="true">¶</a></h2>
<p>List resources can normally be paginated. You can control the pagination using query string parameters:</p>
<ul>
<li>
<p><strong>page</strong> - The page of results to fetch</p>
</li>
<li>
<p><strong>per_page</strong> - The number of results per page</p>
</li>
</ul>
<p>The metadata in the response will contain links to the other pages.</p>
</div><div class="middle"><section id="miscellaneous-methods" class="resource-group"><h2 class="group-heading">Miscellaneous Methods <a href="#miscellaneous-methods" class="permalink">&para;</a></h2></section></div><div class="middle"><div id="miscellaneous-methods-ping" class="resource"><h3 class="resource-heading">Ping <a href="#miscellaneous-methods-ping" class="permalink">&para;</a></h3></div></div><div class="right"><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname">https://perftest</span>/ping</span></div><div class="tabs"><div class="tabs"><div class="example-names"><span>Responses</span><span class="tab-button">200</span></div><div class="tab"><div><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">timestamp</span>": <span class="hljs-value"><span class="hljs-string">"2016-08-08T14:13:09+0000"</span></span>,
  "<span class="hljs-attribute">version</span>": <span class="hljs-value"><span class="hljs-string">"2"</span></span>,
  "<span class="hljs-attribute">build_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-08-08T14:13:09+0000"</span>
</span>}</code></pre><div style="height: 1px;"></div><h5>Schema</h5><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">timestamp</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The current timestamp according to the API server"</span>
    </span>}</span>,
    "<span class="hljs-attribute">version</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The version of the API you're using"</span>
    </span>}</span>,
    "<span class="hljs-attribute">build_date</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp of when this version of the API was built"</span>
    </span>}
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div></div></div><div class="middle"><div id="miscellaneous-methods-ping-get" class="action get"><h4 class="action-heading"><div class="name">Ping</div><a href="#miscellaneous-methods-ping-get" class="method get">GET</a><code class="uri">/ping</code></h4><p>Returns a simple response back to the client with minimal processing. Can be used to check the overall health
of the API, check latency/response time and to confirm the version of the API you’re using.</p>
</div></div><hr class="split"><div class="middle"><section id="data" class="resource-group"><h2 class="group-heading">Data <a href="#data" class="permalink">&para;</a></h2></section></div><div class="middle"><div id="data-data" class="resource"><h3 class="resource-heading">Data <a href="#data-data" class="permalink">&para;</a></h3></div></div><div class="right"><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname">https://perftest</span>/data?<span class="hljs-attribute">page=</span><span class="hljs-literal">1</span>&<span class="hljs-attribute">per_page=</span><span class="hljs-literal">20</span>&<span class="hljs-attribute">key=</span><span class="hljs-literal">foobar</span></span></div><div class="tabs"><div class="tabs"><div class="example-names"><span>Responses</span><span class="tab-button">200</span></div><div class="tab"><div><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1234</span></span>,
      "<span class="hljs-attribute">key</span>": <span class="hljs-value"><span class="hljs-string">"My Data"</span></span>,
      "<span class="hljs-attribute">content</span>": <span class="hljs-value"><span class="hljs-string">"Something meaningful here"</span></span>,
      "<span class="hljs-attribute">external</span>": <span class="hljs-value"><span class="hljs-string">"{  \"duration\": 1234 }"</span></span>,
      "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
      "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
      "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
      "<span class="hljs-attribute">selfURI</span>": <span class="hljs-value"><span class="hljs-string">"http://perftest/data/1234"</span>
    </span>}
  ]</span>,
  "<span class="hljs-attribute">meta</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">pagination</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">total</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">count</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">per_page</span>": <span class="hljs-value"><span class="hljs-number">20</span></span>,
      "<span class="hljs-attribute">current_page</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">total_pages</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">links</span>": <span class="hljs-value">{}
    </span>}
  </span>}
</span>}</code></pre><div style="height: 1px;"></div><h5>Schema</h5><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span>
    </span>}</span>,
    "<span class="hljs-attribute">meta</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">pagination</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
          "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">total</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
              "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The total number of objects in this list"</span>
            </span>}</span>,
            "<span class="hljs-attribute">count</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
              "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The number of objects on this page"</span>
            </span>}</span>,
            "<span class="hljs-attribute">per_page</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
              "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The number of objects per page"</span>
            </span>}</span>,
            "<span class="hljs-attribute">current_page</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
              "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The current page number"</span>
            </span>}</span>,
            "<span class="hljs-attribute">total_pages</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
              "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The total number of pages"</span>
            </span>}</span>,
            "<span class="hljs-attribute">links</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
              "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{}</span>,
              "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Links to other pages"</span>
            </span>}
          </span>}
        </span>}
      </span>}
    </span>}
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div></div></div><div class="middle"><div id="data-data-get" class="action get"><h4 class="action-heading"><div class="name">List Data</div><a href="#data-data-get" class="method get">GET</a><code class="uri">/data{?page,per_page,key}</code></h4><p>Retrieves a paginated list of all resource pools for the account.</p>
<div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>page</dt><dd><code>number</code>&nbsp;<span>(optional)</span>&nbsp;<span class="text-info default"><strong>Default:&nbsp;</strong><span>1</span></span>&nbsp;<span class="text-muted example"><strong>Example:&nbsp;</strong><span>1</span></span><p>The results page</p>
</dd><dt>per_page</dt><dd><code>number</code>&nbsp;<span>(optional)</span>&nbsp;<span class="text-info default"><strong>Default:&nbsp;</strong><span>10</span></span>&nbsp;<span class="text-muted example"><strong>Example:&nbsp;</strong><span>20</span></span><p>The number of results per page</p>
</dd><dt>key</dt><dd><code>string</code>&nbsp;<span>(optional)</span>&nbsp;<span class="text-muted example"><strong>Example:&nbsp;</strong><span>foobar</span></span><p>The key to search for</p>
</dd></dl></div></div></div><hr class="split"><div class="right"><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname">https://perftest</span>/data</span></div><div class="tabs"><div class="example-names"><span>Requests</span><span class="tab-button">Create Data</span></div><div class="tab"><div><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">key</span>": <span class="hljs-value"><span class="hljs-string">"My Data"</span></span>,
  "<span class="hljs-attribute">content</span>": <span class="hljs-value"><span class="hljs-string">"Something meaningful here"</span></span>,
  "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="tabs"><div class="example-names"><span>Responses</span><span class="tab-button">201</span></div><div class="tab"><div><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1234</span></span>,
    "<span class="hljs-attribute">key</span>": <span class="hljs-value"><span class="hljs-string">"My Data"</span></span>,
    "<span class="hljs-attribute">content</span>": <span class="hljs-value"><span class="hljs-string">"Something meaningful here"</span></span>,
    "<span class="hljs-attribute">external</span>": <span class="hljs-value"><span class="hljs-string">"{  \"duration\": 1234 }"</span></span>,
    "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">selfURI</span>": <span class="hljs-value"><span class="hljs-string">"http://perftest/data/1234"</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div><h5>Schema</h5><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"An ID representing the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">key</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"A unique key for the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">content</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The content of the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">external</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"On creation, the response of the external service for the data stored."</span>
        </span>}</span>,
        "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object will expire and will be removed"</span>
        </span>}</span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object was created"</span>
        </span>}</span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object was last updated"</span>
        </span>}</span>,
        "<span class="hljs-attribute">selfURI</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The URL for this object"</span>
        </span>}
      </span>}
    </span>}
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div></div></div></div><div class="middle"><div id="data-data-post" class="action post"><h4 class="action-heading"><div class="name">Create Data</div><a href="#data-data-post" class="method post">POST</a><code class="uri">/data</code></h4><p>Creates a new data item.</p>
<p><strong>Body Parameters</strong></p>
<table>
<thead>
<tr>
<th>Name</th>
<th>Required</th>
<th>Description</th>
<th>Example</th>
</tr>
</thead>
<tbody>
<tr>
<td>key</td>
<td>Yes</td>
<td>A unique key for the data.</td>
<td><code>My Data Key</code></td>
</tr>
<tr>
<td>content</td>
<td>No</td>
<td>The content of the data.</td>
<td><code>Foobar 123</code></td>
</tr>
<tr>
<td>expires_at</td>
<td>No</td>
<td>If required, when the data expires. Defaults to +48 hours.</td>
<td><code>2017-10-10 17:00:00</code></td>
</tr>
<tr>
<td>external</td>
<td>No</td>
<td>If true, the service will try and store data externally via the router.</td>
<td><code>true</code></td>
</tr>
<tr>
<td>size</td>
<td>No</td>
<td>If externally storing data, the size of data to store in MB. Either 1, 5, 10 or 20.</td>
<td><code>1</code></td>
</tr>
<tr>
<td>concurrency</td>
<td>No</td>
<td>If externally storing data, the number of data items to store. Defaults to 1.</td>
<td><code>5</code></td>
</tr>
</tbody>
</table>
</div></div><hr class="split"><div class="middle"><div id="data-data-1" class="resource"><h3 class="resource-heading">Data <a href="#data-data-1" class="permalink">&para;</a></h3></div></div><div class="right"><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname">https://perftest</span>/data/<span class="hljs-attribute" title="id">1234</span></span></div><div class="tabs"><div class="tabs"><div class="example-names"><span>Responses</span><span class="tab-button">200</span></div><div class="tab"><div><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1234</span></span>,
    "<span class="hljs-attribute">key</span>": <span class="hljs-value"><span class="hljs-string">"My Data"</span></span>,
    "<span class="hljs-attribute">content</span>": <span class="hljs-value"><span class="hljs-string">"Something meaningful here"</span></span>,
    "<span class="hljs-attribute">external</span>": <span class="hljs-value"><span class="hljs-string">"{  \"duration\": 1234 }"</span></span>,
    "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">selfURI</span>": <span class="hljs-value"><span class="hljs-string">"http://perftest/data/1234"</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div><h5>Schema</h5><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"An ID representing the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">key</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"A unique key for the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">content</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The content of the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">external</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"On creation, the response of the external service for the data stored."</span>
        </span>}</span>,
        "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object will expire and will be removed"</span>
        </span>}</span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object was created"</span>
        </span>}</span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object was last updated"</span>
        </span>}</span>,
        "<span class="hljs-attribute">selfURI</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The URL for this object"</span>
        </span>}
      </span>}
    </span>}
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div></div></div><div class="middle"><div id="data-data-get-1" class="action get"><h4 class="action-heading"><div class="name">Get Data</div><a href="#data-data-get-1" class="method get">GET</a><code class="uri">/data/{id}</code></h4><p>Returns a single data item.</p>
<div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>id</dt><dd><code>number</code>&nbsp;<span class="required">(required)</span>&nbsp;<span class="text-muted example"><strong>Example:&nbsp;</strong><span>1234</span></span><p>The ID of the data</p>
</dd></dl></div></div></div><hr class="split"><div class="right"><div class="definition"><span class="method put">PUT</span>&nbsp;<span class="uri"><span class="hostname">https://perftest</span>/data/<span class="hljs-attribute" title="id">1234</span></span></div><div class="tabs"><div class="example-names"><span>Requests</span><span class="tab-button">Update Data</span></div><div class="tab"><div><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">key</span>": <span class="hljs-value"><span class="hljs-string">"My Data"</span></span>,
  "<span class="hljs-attribute">content</span>": <span class="hljs-value"><span class="hljs-string">"Something meaningful here"</span></span>,
  "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span>
</span>}</code></pre><div style="height: 1px;"></div><h5>Schema</h5><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">key</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"A unique key for the data"</span>
    </span>}</span>,
    "<span class="hljs-attribute">content</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The content of the data"</span>
    </span>}</span>,
    "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object will expire and will be removed"</span>
    </span>}
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="tabs"><div class="example-names"><span>Responses</span><span class="tab-button">202</span></div><div class="tab"><div><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1234</span></span>,
    "<span class="hljs-attribute">key</span>": <span class="hljs-value"><span class="hljs-string">"My Data"</span></span>,
    "<span class="hljs-attribute">content</span>": <span class="hljs-value"><span class="hljs-string">"Something meaningful here"</span></span>,
    "<span class="hljs-attribute">external</span>": <span class="hljs-value"><span class="hljs-string">"{  \"duration\": 1234 }"</span></span>,
    "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">selfURI</span>": <span class="hljs-value"><span class="hljs-string">"http://perftest/data/1234"</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div><h5>Schema</h5><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"An ID representing the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">key</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"A unique key for the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">content</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The content of the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">external</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"On creation, the response of the external service for the data stored."</span>
        </span>}</span>,
        "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object will expire and will be removed"</span>
        </span>}</span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object was created"</span>
        </span>}</span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object was last updated"</span>
        </span>}</span>,
        "<span class="hljs-attribute">selfURI</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The URL for this object"</span>
        </span>}
      </span>}
    </span>}
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div></div></div></div><div class="middle"><div id="data-data-put" class="action put"><h4 class="action-heading"><div class="name">Update Data</div><a href="#data-data-put" class="method put">PUT</a><code class="uri">/data/{id}</code></h4><p>This accepts partial updates of the properties of the data.</p>
<p><strong>Body Parameters</strong></p>
<table>
<thead>
<tr>
<th>Name</th>
<th>Required</th>
<th>Description</th>
<th>Example</th>
</tr>
</thead>
<tbody>
<tr>
<td>key</td>
<td>Yes</td>
<td>A unique key for the data.</td>
<td><code>My Data Key</code></td>
</tr>
<tr>
<td>content</td>
<td>No</td>
<td>The content of the data.</td>
<td><code>Foobar 123</code></td>
</tr>
<tr>
<td>expires_at</td>
<td>No</td>
<td>If required, when the data expires. Defaults to +48 hours.</td>
<td><code>2017-10-10 17:00:00</code></td>
</tr>
</tbody>
</table>
<div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>id</dt><dd><code>number</code>&nbsp;<span class="required">(required)</span>&nbsp;<span class="text-muted example"><strong>Example:&nbsp;</strong><span>1234</span></span><p>The ID of the data</p>
</dd></dl></div></div></div><hr class="split"><div class="right"><div class="definition"><span class="method delete">DELETE</span>&nbsp;<span class="uri"><span class="hostname">https://perftest</span>/data/<span class="hljs-attribute" title="id">1234</span></span></div><div class="tabs"><div class="tabs"><div class="example-names"><span>Responses</span><span class="tab-button">202</span></div><div class="tab"><div><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1234</span></span>,
    "<span class="hljs-attribute">key</span>": <span class="hljs-value"><span class="hljs-string">"My Data"</span></span>,
    "<span class="hljs-attribute">content</span>": <span class="hljs-value"><span class="hljs-string">"Something meaningful here"</span></span>,
    "<span class="hljs-attribute">external</span>": <span class="hljs-value"><span class="hljs-string">"{  \"duration\": 1234 }"</span></span>,
    "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2017-06-27T12:58:00+0000"</span></span>,
    "<span class="hljs-attribute">selfURI</span>": <span class="hljs-value"><span class="hljs-string">"http://perftest/data/1234"</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div><h5>Schema</h5><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"An ID representing the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">key</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"A unique key for the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">content</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The content of the data"</span>
        </span>}</span>,
        "<span class="hljs-attribute">external</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"On creation, the response of the external service for the data stored."</span>
        </span>}</span>,
        "<span class="hljs-attribute">expires_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object will expire and will be removed"</span>
        </span>}</span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object was created"</span>
        </span>}</span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The timestamp when the object was last updated"</span>
        </span>}</span>,
        "<span class="hljs-attribute">selfURI</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"The URL for this object"</span>
        </span>}
      </span>}
    </span>}
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div></div></div><div class="middle"><div id="data-data-delete" class="action delete"><h4 class="action-heading"><div class="name">Delete Data</div><a href="#data-data-delete" class="method delete">DELETE</a><code class="uri">/data/{id}</code></h4><p>Removes the data.</p>
<div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>id</dt><dd><code>number</code>&nbsp;<span class="required">(required)</span>&nbsp;<span class="text-muted example"><strong>Example:&nbsp;</strong><span>1234</span></span><p>The ID of the data</p>
</dd></dl></div></div></div><hr class="split"><div class="middle"><p style="text-align: center;" class="text-muted">Generated by&nbsp;<a href="https://github.com/danielgtaylor/aglio" class="aglio">aglio</a>&nbsp;on 10 Oct 2017</p></div></div></div></div><script>/* eslint-env browser */
/* eslint quotes: [2, "single"] */
'use strict';

/*
  Determine if a string ends with another string.
*/
function endsWith(str, suffix) {
    return str.indexOf(suffix, str.length - suffix.length) !== -1;
}

/*
  Get a list of direct child elements by class name.
*/
function childrenByClass(element, name) {
  var filtered = [];

  for (var i = 0; i < element.children.length; i++) {
    var child = element.children[i];
    var classNames = child.className.split(' ');
    if (classNames.indexOf(name) !== -1) {
      filtered.push(child);
    }
  }

  return filtered;
}

/*
  Get an array [width, height] of the window.
*/
function getWindowDimensions() {
  var w = window,
      d = document,
      e = d.documentElement,
      g = d.body,
      x = w.innerWidth || e.clientWidth || g.clientWidth,
      y = w.innerHeight || e.clientHeight || g.clientHeight;

  return [x, y];
}

/*
  Collapse or show a request/response example.
*/
function toggleCollapseButton(event) {
    var button = event.target.parentNode;
    var content = button.parentNode.nextSibling;
    var inner = content.children[0];

    if (button.className.indexOf('collapse-button') === -1) {
      // Clicked without hitting the right element?
      return;
    }

    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        // Currently showing, so let's hide it
        button.className = 'collapse-button';
        content.style.maxHeight = '0px';
    } else {
        // Currently hidden, so let's show it
        button.className = 'collapse-button show';
        content.style.maxHeight = inner.offsetHeight + 12 + 'px';
    }
}

function toggleTabButton(event) {
    var i, index;
    var button = event.target;

    // Get index of the current button.
    var buttons = childrenByClass(button.parentNode, 'tab-button');
    for (i = 0; i < buttons.length; i++) {
        if (buttons[i] === button) {
            index = i;
            button.className = 'tab-button active';
        } else {
            buttons[i].className = 'tab-button';
        }
    }

    // Hide other tabs and show this one.
    var tabs = childrenByClass(button.parentNode.parentNode, 'tab');
    for (i = 0; i < tabs.length; i++) {
        if (i === index) {
            tabs[i].style.display = 'block';
        } else {
            tabs[i].style.display = 'none';
        }
    }
}

/*
  Collapse or show a navigation menu. It will not be hidden unless it
  is currently selected or `force` has been passed.
*/
function toggleCollapseNav(event, force) {
    var heading = event.target.parentNode;
    var content = heading.nextSibling;
    var inner = content.children[0];

    if (heading.className.indexOf('heading') === -1) {
      // Clicked without hitting the right element?
      return;
    }

    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
      // Currently showing, so let's hide it, but only if this nav item
      // is already selected. This prevents newly selected items from
      // collapsing in an annoying fashion.
      if (force || window.location.hash && endsWith(event.target.href, window.location.hash)) {
        content.style.maxHeight = '0px';
      }
    } else {
      // Currently hidden, so let's show it
      content.style.maxHeight = inner.offsetHeight + 12 + 'px';
    }
}

/*
  Refresh the page after a live update from the server. This only
  works in live preview mode (using the `--server` parameter).
*/
function refresh(body) {
    document.querySelector('body').className = 'preload';
    document.body.innerHTML = body;

    // Re-initialize the page
    init();
    autoCollapse();

    document.querySelector('body').className = '';
}

/*
  Determine which navigation items should be auto-collapsed to show as many
  as possible on the screen, based on the current window height. This also
  collapses them.
*/
function autoCollapse() {
  var windowHeight = getWindowDimensions()[1];
  var itemsHeight = 64; /* Account for some padding */
  var itemsArray = Array.prototype.slice.call(
    document.querySelectorAll('nav .resource-group .heading'));

  // Get the total height of the navigation items
  itemsArray.forEach(function (item) {
    itemsHeight += item.parentNode.offsetHeight;
  });

  // Should we auto-collapse any nav items? Try to find the smallest item
  // that can be collapsed to show all items on the screen. If not possible,
  // then collapse the largest item and do it again. First, sort the items
  // by height from smallest to largest.
  var sortedItems = itemsArray.sort(function (a, b) {
    return a.parentNode.offsetHeight - b.parentNode.offsetHeight;
  });

  while (sortedItems.length && itemsHeight > windowHeight) {
    for (var i = 0; i < sortedItems.length; i++) {
      // Will collapsing this item help?
      var itemHeight = sortedItems[i].nextSibling.offsetHeight;
      if ((itemsHeight - itemHeight <= windowHeight) || i === sortedItems.length - 1) {
        // It will, so let's collapse it, remove its content height from
        // our total and then remove it from our list of candidates
        // that can be collapsed.
        itemsHeight -= itemHeight;
        toggleCollapseNav({target: sortedItems[i].children[0]}, true);
        sortedItems.splice(i, 1);
        break;
      }
    }
  }
}

/*
  Initialize the interactive functionality of the page.
*/
function init() {
    var i, j;

    // Make collapse buttons clickable
    var buttons = document.querySelectorAll('.collapse-button');
    for (i = 0; i < buttons.length; i++) {
        buttons[i].onclick = toggleCollapseButton;

        // Show by default? Then toggle now.
        if (buttons[i].className.indexOf('show') !== -1) {
            toggleCollapseButton({target: buttons[i].children[0]});
        }
    }

    var responseCodes = document.querySelectorAll('.example-names');
    for (i = 0; i < responseCodes.length; i++) {
        var tabButtons = childrenByClass(responseCodes[i], 'tab-button');
        for (j = 0; j < tabButtons.length; j++) {
            tabButtons[j].onclick = toggleTabButton;

            // Show by default?
            if (j === 0) {
                toggleTabButton({target: tabButtons[j]});
            }
        }
    }

    // Make nav items clickable to collapse/expand their content.
    var navItems = document.querySelectorAll('nav .resource-group .heading');
    for (i = 0; i < navItems.length; i++) {
        navItems[i].onclick = toggleCollapseNav;

        // Show all by default
        toggleCollapseNav({target: navItems[i].children[0]});
    }
}

// Initial call to set up buttons
init();

window.onload = function () {
    autoCollapse();
    // Remove the `preload` class to enable animations
    document.querySelector('body').className = '';
};
</script></body></html>