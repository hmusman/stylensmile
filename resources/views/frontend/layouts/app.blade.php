<!DOCTYPE html>
<!-- saved from url=(0262)https://stylensmile.pk:2083/cpsess5763381910/frontend/paper_lantern/filemanager/editit.html?file=app.blade.php&fileop=&dir=%2Fhome%2Fdevsbeta%2Fstylensmile.pk%2Fresources%2Fviews%2Ffrontend%2Flayouts&dirop=&charset=&file_charset=_DETECT_&baseurl=&basedir=&edit=1 -->
<html extension-installed="true"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>app.blade.php - cPanel File Manager v3</title>
        

        <link rel="stylesheet" type="text/css" href="./app.blade_files/bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="./app.blade_files/open_sans.min.css">
        <link rel="stylesheet" type="text/css" href="./app.blade_files/all.min.css">
        <link rel="stylesheet" type="text/css" href="./app.blade_files/tree_styles2_optimized.css">

        <script type="text/javascript" src="./app.blade_files/utilities_container.js.download"></script>
        <script type="text/javascript" src="./app.blade_files/cpanel-all-min.js.download"></script>
        <script type="text/javascript" src="./app.blade_files/filemanager_editors_optimized.js.download"></script>

        
<link rel="stylesheet" type="text/css" href="./app.blade_files/ajaxapp-min.css">
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="/cPanel_magic_revision_1594082096/cjt/css/ajaxapp_ie6.css" />
<![endif]-->


        <style type="text/css">
            html, body, #maintbl {
                height: 100%;
                width: 100%;
                margin: 0;
                padding: 0;
                background: none !important;
            }

            form { margin: 0 }

            #maintbl, #maintbl tr, #maintbl td {
                margin:0;
                padding:0;
                border-collapse: collapse;
                border: none;
            }

            .cjt_progress_overlay .bd {
                background: transparent;
            }

            /* Suppress inherited styles from global style sheets. */
            .yui-panel .hd,
            .yui-panel .bd,
            .yui-panel .ft {
                background-image: none;
                font-size: 100%;

            }
            .yui-panel .ft {
                background-color: #CCCCCC;
            }

            /* overrides from tree_styles2_optimized.css */
            p {
                line-height: normal;
            }
            .header {
                background: #333333;
                color: #FFFFFF;
                padding: 5px;
            }
            .button-group .default {
                background: none !important;
                padding: 0;
            }

            .action-buttons {
                text-align: right;
            }

            .editor-area {
                position: absolute !important;
                top: 94px;
                right: 0;
                left: 0;
                bottom: 20px;
                border: 1px solid #CCCCCC;
            }

            .editor-toolbar {
                padding-top: 5px;
                padding-bottom: 5px;
            }

            .editor-toolbar .fa-terminal {
                font-size: inherit;
            }

            .btn-group-ddl {
                padding: 1px;
            }

            .help-link {
                padding: 14px;
                display: block;
            }

            @media (max-width: 503px) {
                .editor-area {
                    top: 245px;
                }
                .action-buttons {
                    text-align: left;
                }
            }

            @media (min-width: 504px) and (max-width: 768px) {
                .editor-area {
                    top: 200px;
                }
            }

            @media (min-width: 769px) and (max-width: 1074px) {
                .editor-area {
                    top: 130px;
                }
            }
        </style>

        <!--[if IE]>
        <style type="text/css">
            #legacy_codewindow {
                width: 99.5%;
            }
        </style>
        <![endif]-->

    <style id="ace_editor.css">.ace_editor {position: relative;overflow: hidden;font: 12px/normal 'Monaco', 'Menlo', 'Ubuntu Mono', 'Consolas', 'source-code-pro', monospace;direction: ltr;text-align: left;-webkit-tap-highlight-color: rgba(0, 0, 0, 0);}.ace_scroller {position: absolute;overflow: hidden;top: 0;bottom: 0;background-color: inherit;-ms-user-select: none;-moz-user-select: none;-webkit-user-select: none;user-select: none;cursor: text;}.ace_content {position: absolute;box-sizing: border-box;min-width: 100%;}.ace_dragging .ace_scroller:before{position: absolute;top: 0;left: 0;right: 0;bottom: 0;content: '';background: rgba(250, 250, 250, 0.01);z-index: 1000;}.ace_dragging.ace_dark .ace_scroller:before{background: rgba(0, 0, 0, 0.01);}.ace_selecting, .ace_selecting * {cursor: text !important;}.ace_gutter {position: absolute;overflow : hidden;width: auto;top: 0;bottom: 0;left: 0;cursor: default;z-index: 4;-ms-user-select: none;-moz-user-select: none;-webkit-user-select: none;user-select: none;}.ace_gutter-active-line {position: absolute;left: 0;right: 0;}.ace_scroller.ace_scroll-left {box-shadow: 17px 0 16px -16px rgba(0, 0, 0, 0.4) inset;}.ace_gutter-cell {padding-left: 19px;padding-right: 6px;background-repeat: no-repeat;}.ace_gutter-cell.ace_error {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAABOFBMVEX/////////QRswFAb/Ui4wFAYwFAYwFAaWGAfDRymzOSH/PxswFAb/SiUwFAYwFAbUPRvjQiDllog5HhHdRybsTi3/Tyv9Tir+Syj/UC3////XurebMBIwFAb/RSHbPx/gUzfdwL3kzMivKBAwFAbbvbnhPx66NhowFAYwFAaZJg8wFAaxKBDZurf/RB6mMxb/SCMwFAYwFAbxQB3+RB4wFAb/Qhy4Oh+4QifbNRcwFAYwFAYwFAb/QRzdNhgwFAYwFAbav7v/Uy7oaE68MBK5LxLewr/r2NXewLswFAaxJw4wFAbkPRy2PyYwFAaxKhLm1tMwFAazPiQwFAaUGAb/QBrfOx3bvrv/VC/maE4wFAbRPBq6MRO8Qynew8Dp2tjfwb0wFAbx6eju5+by6uns4uH9/f36+vr/GkHjAAAAYnRSTlMAGt+64rnWu/bo8eAA4InH3+DwoN7j4eLi4xP99Nfg4+b+/u9B/eDs1MD1mO7+4PHg2MXa347g7vDizMLN4eG+Pv7i5evs/v79yu7S3/DV7/498Yv24eH+4ufQ3Ozu/v7+y13sRqwAAADLSURBVHjaZc/XDsFgGIBhtDrshlitmk2IrbHFqL2pvXf/+78DPokj7+Fz9qpU/9UXJIlhmPaTaQ6QPaz0mm+5gwkgovcV6GZzd5JtCQwgsxoHOvJO15kleRLAnMgHFIESUEPmawB9ngmelTtipwwfASilxOLyiV5UVUyVAfbG0cCPHig+GBkzAENHS0AstVF6bacZIOzgLmxsHbt2OecNgJC83JERmePUYq8ARGkJx6XtFsdddBQgZE2nPR6CICZhawjA4Fb/chv+399kfR+MMMDGOQAAAABJRU5ErkJggg==");background-repeat: no-repeat;background-position: 2px center;}.ace_gutter-cell.ace_warning {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAmVBMVEX///8AAAD///8AAAAAAABPSzb/5sAAAAB/blH/73z/ulkAAAAAAAD85pkAAAAAAAACAgP/vGz/rkDerGbGrV7/pkQICAf////e0IsAAAD/oED/qTvhrnUAAAD/yHD/njcAAADuv2r/nz//oTj/p064oGf/zHAAAAA9Nir/tFIAAAD/tlTiuWf/tkIAAACynXEAAAAAAAAtIRW7zBpBAAAAM3RSTlMAABR1m7RXO8Ln31Z36zT+neXe5OzooRDfn+TZ4p3h2hTf4t3k3ucyrN1K5+Xaks52Sfs9CXgrAAAAjklEQVR42o3PbQ+CIBQFYEwboPhSYgoYunIqqLn6/z8uYdH8Vmdnu9vz4WwXgN/xTPRD2+sgOcZjsge/whXZgUaYYvT8QnuJaUrjrHUQreGczuEafQCO/SJTufTbroWsPgsllVhq3wJEk2jUSzX3CUEDJC84707djRc5MTAQxoLgupWRwW6UB5fS++NV8AbOZgnsC7BpEAAAAABJRU5ErkJggg==");background-position: 2px center;}.ace_gutter-cell.ace_info {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAAJ0Uk5TAAB2k804AAAAPklEQVQY02NgIB68QuO3tiLznjAwpKTgNyDbMegwisCHZUETUZV0ZqOquBpXj2rtnpSJT1AEnnRmL2OgGgAAIKkRQap2htgAAAAASUVORK5CYII=");background-position: 2px center;}.ace_dark .ace_gutter-cell.ace_info {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAJFBMVEUAAAChoaGAgIAqKiq+vr6tra1ZWVmUlJSbm5s8PDxubm56enrdgzg3AAAAAXRSTlMAQObYZgAAAClJREFUeNpjYMAPdsMYHegyJZFQBlsUlMFVCWUYKkAZMxZAGdxlDMQBAG+TBP4B6RyJAAAAAElFTkSuQmCC");}.ace_scrollbar {position: absolute;right: 0;bottom: 0;z-index: 6;}.ace_scrollbar-inner {position: absolute;cursor: text;left: 0;top: 0;}.ace_scrollbar-v{overflow-x: hidden;overflow-y: scroll;top: 0;}.ace_scrollbar-h {overflow-x: scroll;overflow-y: hidden;left: 0;}.ace_print-margin {position: absolute;height: 100%;}.ace_text-input {position: absolute;z-index: 0;width: 0.5em;height: 1em;opacity: 0;background: transparent;-moz-appearance: none;appearance: none;border: none;resize: none;outline: none;overflow: hidden;font: inherit;padding: 0 1px;margin: 0 -1px;text-indent: -1em;-ms-user-select: text;-moz-user-select: text;-webkit-user-select: text;user-select: text;white-space: pre!important;}.ace_text-input.ace_composition {background: inherit;color: inherit;z-index: 1000;opacity: 1;text-indent: 0;}[ace_nocontext=true] {transform: none!important;filter: none!important;perspective: none!important;clip-path: none!important;mask : none!important;contain: none!important;perspective: none!important;mix-blend-mode: initial!important;z-index: auto;}.ace_layer {z-index: 1;position: absolute;overflow: hidden;word-wrap: normal;white-space: pre;height: 100%;width: 100%;box-sizing: border-box;pointer-events: none;}.ace_gutter-layer {position: relative;width: auto;text-align: right;pointer-events: auto;}.ace_text-layer {font: inherit !important;}.ace_cjk {display: inline-block;text-align: center;}.ace_cursor-layer {z-index: 4;}.ace_cursor {z-index: 4;position: absolute;box-sizing: border-box;border-left: 2px solid;transform: translatez(0);}.ace_multiselect .ace_cursor {border-left-width: 1px;}.ace_slim-cursors .ace_cursor {border-left-width: 1px;}.ace_overwrite-cursors .ace_cursor {border-left-width: 0;border-bottom: 1px solid;}.ace_hidden-cursors .ace_cursor {opacity: 0.2;}.ace_smooth-blinking .ace_cursor {transition: opacity 0.18s;}.ace_marker-layer .ace_step, .ace_marker-layer .ace_stack {position: absolute;z-index: 3;}.ace_marker-layer .ace_selection {position: absolute;z-index: 5;}.ace_marker-layer .ace_bracket {position: absolute;z-index: 6;}.ace_marker-layer .ace_active-line {position: absolute;z-index: 2;}.ace_marker-layer .ace_selected-word {position: absolute;z-index: 4;box-sizing: border-box;}.ace_line .ace_fold {box-sizing: border-box;display: inline-block;height: 11px;margin-top: -2px;vertical-align: middle;background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAJCAYAAADU6McMAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAJpJREFUeNpi/P//PwOlgAXGYGRklAVSokD8GmjwY1wasKljQpYACtpCFeADcHVQfQyMQAwzwAZI3wJKvCLkfKBaMSClBlR7BOQikCFGQEErIH0VqkabiGCAqwUadAzZJRxQr/0gwiXIal8zQQPnNVTgJ1TdawL0T5gBIP1MUJNhBv2HKoQHHjqNrA4WO4zY0glyNKLT2KIfIMAAQsdgGiXvgnYAAAAASUVORK5CYII="),url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAA3CAYAAADNNiA5AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACJJREFUeNpi+P//fxgTAwPDBxDxD078RSX+YeEyDFMCIMAAI3INmXiwf2YAAAAASUVORK5CYII=");background-repeat: no-repeat, repeat-x;background-position: center center, top left;color: transparent;border: 1px solid black;border-radius: 2px;cursor: pointer;pointer-events: auto;}.ace_dark .ace_fold {}.ace_fold:hover{background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAJCAYAAADU6McMAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAJpJREFUeNpi/P//PwOlgAXGYGRklAVSokD8GmjwY1wasKljQpYACtpCFeADcHVQfQyMQAwzwAZI3wJKvCLkfKBaMSClBlR7BOQikCFGQEErIH0VqkabiGCAqwUadAzZJRxQr/0gwiXIal8zQQPnNVTgJ1TdawL0T5gBIP1MUJNhBv2HKoQHHjqNrA4WO4zY0glyNKLT2KIfIMAAQsdgGiXvgnYAAAAASUVORK5CYII="),url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAA3CAYAAADNNiA5AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACBJREFUeNpi+P//fz4TAwPDZxDxD5X4i5fLMEwJgAADAEPVDbjNw87ZAAAAAElFTkSuQmCC");}.ace_tooltip {background-color: #FFF;background-image: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.1));border: 1px solid gray;border-radius: 1px;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);color: black;max-width: 100%;padding: 3px 4px;position: fixed;z-index: 999999;box-sizing: border-box;cursor: default;white-space: pre;word-wrap: break-word;line-height: normal;font-style: normal;font-weight: normal;letter-spacing: normal;pointer-events: none;}.ace_folding-enabled > .ace_gutter-cell {padding-right: 13px;}.ace_fold-widget {box-sizing: border-box;margin: 0 -12px 0 1px;display: none;width: 11px;vertical-align: top;background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAANElEQVR42mWKsQ0AMAzC8ixLlrzQjzmBiEjp0A6WwBCSPgKAXoLkqSot7nN3yMwR7pZ32NzpKkVoDBUxKAAAAABJRU5ErkJggg==");background-repeat: no-repeat;background-position: center;border-radius: 3px;border: 1px solid transparent;cursor: pointer;}.ace_folding-enabled .ace_fold-widget {display: inline-block;   }.ace_fold-widget.ace_end {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAANElEQVR42m3HwQkAMAhD0YzsRchFKI7sAikeWkrxwScEB0nh5e7KTPWimZki4tYfVbX+MNl4pyZXejUO1QAAAABJRU5ErkJggg==");}.ace_fold-widget.ace_closed {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAAGCAYAAAAG5SQMAAAAOUlEQVR42jXKwQkAMAgDwKwqKD4EwQ26sSOkVWjgIIHAzPiCgaqiqnJHZnKICBERHN194O5b9vbLuAVRL+l0YWnZAAAAAElFTkSuQmCCXA==");}.ace_fold-widget:hover {border: 1px solid rgba(0, 0, 0, 0.3);background-color: rgba(255, 255, 255, 0.2);box-shadow: 0 1px 1px rgba(255, 255, 255, 0.7);}.ace_fold-widget:active {border: 1px solid rgba(0, 0, 0, 0.4);background-color: rgba(0, 0, 0, 0.05);box-shadow: 0 1px 1px rgba(255, 255, 255, 0.8);}.ace_dark .ace_fold-widget {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHklEQVQIW2P4//8/AzoGEQ7oGCaLLAhWiSwB146BAQCSTPYocqT0AAAAAElFTkSuQmCC");}.ace_dark .ace_fold-widget.ace_end {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAH0lEQVQIW2P4//8/AxQ7wNjIAjDMgC4AxjCVKBirIAAF0kz2rlhxpAAAAABJRU5ErkJggg==");}.ace_dark .ace_fold-widget.ace_closed {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAAFCAYAAACAcVaiAAAAHElEQVQIW2P4//+/AxAzgDADlOOAznHAKgPWAwARji8UIDTfQQAAAABJRU5ErkJggg==");}.ace_dark .ace_fold-widget:hover {box-shadow: 0 1px 1px rgba(255, 255, 255, 0.2);background-color: rgba(255, 255, 255, 0.1);}.ace_dark .ace_fold-widget:active {box-shadow: 0 1px 1px rgba(255, 255, 255, 0.2);}.ace_inline_button {border: 1px solid lightgray;display: inline-block;margin: -1px 8px;padding: 0 5px;pointer-events: auto;cursor: pointer;}.ace_inline_button:hover {border-color: gray;background: rgba(200,200,200,0.2);display: inline-block;pointer-events: auto;}.ace_fold-widget.ace_invalid {background-color: #FFB4B4;border-color: #DE5555;}.ace_fade-fold-widgets .ace_fold-widget {transition: opacity 0.4s ease 0.05s;opacity: 0;}.ace_fade-fold-widgets:hover .ace_fold-widget {transition: opacity 0.05s ease 0.05s;opacity:1;}.ace_underline {text-decoration: underline;}.ace_bold {font-weight: bold;}.ace_nobold .ace_bold {font-weight: normal;}.ace_italic {font-style: italic;}.ace_error-marker {background-color: rgba(255, 0, 0,0.2);position: absolute;z-index: 9;}.ace_highlight-marker {background-color: rgba(255, 255, 0,0.2);position: absolute;z-index: 8;}.ace_br1 {border-top-left-radius    : 3px;}.ace_br2 {border-top-right-radius   : 3px;}.ace_br3 {border-top-left-radius    : 3px; border-top-right-radius:    3px;}.ace_br4 {border-bottom-right-radius: 3px;}.ace_br5 {border-top-left-radius    : 3px; border-bottom-right-radius: 3px;}.ace_br6 {border-top-right-radius   : 3px; border-bottom-right-radius: 3px;}.ace_br7 {border-top-left-radius    : 3px; border-top-right-radius:    3px; border-bottom-right-radius: 3px;}.ace_br8 {border-bottom-left-radius : 3px;}.ace_br9 {border-top-left-radius    : 3px; border-bottom-left-radius:  3px;}.ace_br10{border-top-right-radius   : 3px; border-bottom-left-radius:  3px;}.ace_br11{border-top-left-radius    : 3px; border-top-right-radius:    3px; border-bottom-left-radius:  3px;}.ace_br12{border-bottom-right-radius: 3px; border-bottom-left-radius:  3px;}.ace_br13{border-top-left-radius    : 3px; border-bottom-right-radius: 3px; border-bottom-left-radius:  3px;}.ace_br14{border-top-right-radius   : 3px; border-bottom-right-radius: 3px; border-bottom-left-radius:  3px;}.ace_br15{border-top-left-radius    : 3px; border-top-right-radius:    3px; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px;}.ace_text-input-ios {position: absolute !important;top: -100000px !important;left: -100000px !important;}
/*# sourceURL=ace/css/ace_editor.css */</style><style id="ace-tm">.ace-tm .ace_gutter {background: #f0f0f0;color: #333;}.ace-tm .ace_print-margin {width: 1px;background: #e8e8e8;}.ace-tm .ace_fold {background-color: #6B72E6;}.ace-tm {background-color: #FFFFFF;color: black;}.ace-tm .ace_cursor {color: black;}.ace-tm .ace_invisible {color: rgb(191, 191, 191);}.ace-tm .ace_storage,.ace-tm .ace_keyword {color: blue;}.ace-tm .ace_constant {color: rgb(197, 6, 11);}.ace-tm .ace_constant.ace_buildin {color: rgb(88, 72, 246);}.ace-tm .ace_constant.ace_language {color: rgb(88, 92, 246);}.ace-tm .ace_constant.ace_library {color: rgb(6, 150, 14);}.ace-tm .ace_invalid {background-color: rgba(255, 0, 0, 0.1);color: red;}.ace-tm .ace_support.ace_function {color: rgb(60, 76, 114);}.ace-tm .ace_support.ace_constant {color: rgb(6, 150, 14);}.ace-tm .ace_support.ace_type,.ace-tm .ace_support.ace_class {color: rgb(109, 121, 222);}.ace-tm .ace_keyword.ace_operator {color: rgb(104, 118, 135);}.ace-tm .ace_string {color: rgb(3, 106, 7);}.ace-tm .ace_comment {color: rgb(76, 136, 107);}.ace-tm .ace_comment.ace_doc {color: rgb(0, 102, 255);}.ace-tm .ace_comment.ace_doc.ace_tag {color: rgb(128, 159, 191);}.ace-tm .ace_constant.ace_numeric {color: rgb(0, 0, 205);}.ace-tm .ace_variable {color: rgb(49, 132, 149);}.ace-tm .ace_xml-pe {color: rgb(104, 104, 91);}.ace-tm .ace_entity.ace_name.ace_function {color: #0000A2;}.ace-tm .ace_heading {color: rgb(12, 7, 255);}.ace-tm .ace_list {color:rgb(185, 6, 144);}.ace-tm .ace_meta.ace_tag {color:rgb(0, 22, 142);}.ace-tm .ace_string.ace_regex {color: rgb(255, 0, 0)}.ace-tm .ace_marker-layer .ace_selection {background: rgb(181, 213, 255);}.ace-tm.ace_multiselect .ace_selection.ace_start {box-shadow: 0 0 3px 0px white;}.ace-tm .ace_marker-layer .ace_step {background: rgb(252, 255, 0);}.ace-tm .ace_marker-layer .ace_stack {background: rgb(164, 229, 101);}.ace-tm .ace_marker-layer .ace_bracket {margin: -1px 0 0 -1px;border: 1px solid rgb(192, 192, 192);}.ace-tm .ace_marker-layer .ace_active-line {background: rgba(0, 0, 0, 0.07);}.ace-tm .ace_gutter-active-line {background-color : #dcdcdc;}.ace-tm .ace_marker-layer .ace_selected-word {background: rgb(250, 250, 255);border: 1px solid rgb(200, 200, 250);}.ace-tm .ace_indent-guide {background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAACCAYAAACZgbYnAAAAE0lEQVQImWP4////f4bLly//BwAmVgd1/w11/gAAAABJRU5ErkJggg==") right repeat-y;}
/*# sourceURL=ace/css/ace-tm */</style><style>    .error_widget_wrapper {        background: inherit;        color: inherit;        border:none    }    .error_widget {        border-top: solid 2px;        border-bottom: solid 2px;        margin: 5px 0;        padding: 10px 40px;        white-space: pre-wrap;    }    .error_widget.ace_error, .error_widget_arrow.ace_error{        border-color: #ff5a5a    }    .error_widget.ace_warning, .error_widget_arrow.ace_warning{        border-color: #F1D817    }    .error_widget.ace_info, .error_widget_arrow.ace_info{        border-color: #5a5a5a    }    .error_widget.ace_ok, .error_widget_arrow.ace_ok{        border-color: #5aaa5a    }    .error_widget_arrow {        position: absolute;        border: solid 5px;        border-top-color: transparent!important;        border-right-color: transparent!important;        border-left-color: transparent!important;        top: -5px;    }</style><script src="./app.blade_files/mode-php.js.download"></script><script src="./app.blade_files/theme-chrome.js.download"></script><style id="ace-chrome">.ace-chrome .ace_gutter {background: #ebebeb;color: #333;overflow : hidden;}.ace-chrome .ace_print-margin {width: 1px;background: #e8e8e8;}.ace-chrome {background-color: #FFFFFF;color: black;}.ace-chrome .ace_cursor {color: black;}.ace-chrome .ace_invisible {color: rgb(191, 191, 191);}.ace-chrome .ace_constant.ace_buildin {color: rgb(88, 72, 246);}.ace-chrome .ace_constant.ace_language {color: rgb(88, 92, 246);}.ace-chrome .ace_constant.ace_library {color: rgb(6, 150, 14);}.ace-chrome .ace_invalid {background-color: rgb(153, 0, 0);color: white;}.ace-chrome .ace_fold {}.ace-chrome .ace_support.ace_function {color: rgb(60, 76, 114);}.ace-chrome .ace_support.ace_constant {color: rgb(6, 150, 14);}.ace-chrome .ace_support.ace_type,.ace-chrome .ace_support.ace_class.ace-chrome .ace_support.ace_other {color: rgb(109, 121, 222);}.ace-chrome .ace_variable.ace_parameter {font-style:italic;color:#FD971F;}.ace-chrome .ace_keyword.ace_operator {color: rgb(104, 118, 135);}.ace-chrome .ace_comment {color: #236e24;}.ace-chrome .ace_comment.ace_doc {color: #236e24;}.ace-chrome .ace_comment.ace_doc.ace_tag {color: #236e24;}.ace-chrome .ace_constant.ace_numeric {color: rgb(0, 0, 205);}.ace-chrome .ace_variable {color: rgb(49, 132, 149);}.ace-chrome .ace_xml-pe {color: rgb(104, 104, 91);}.ace-chrome .ace_entity.ace_name.ace_function {color: #0000A2;}.ace-chrome .ace_heading {color: rgb(12, 7, 255);}.ace-chrome .ace_list {color:rgb(185, 6, 144);}.ace-chrome .ace_marker-layer .ace_selection {background: rgb(181, 213, 255);}.ace-chrome .ace_marker-layer .ace_step {background: rgb(252, 255, 0);}.ace-chrome .ace_marker-layer .ace_stack {background: rgb(164, 229, 101);}.ace-chrome .ace_marker-layer .ace_bracket {margin: -1px 0 0 -1px;border: 1px solid rgb(192, 192, 192);}.ace-chrome .ace_marker-layer .ace_active-line {background: rgba(0, 0, 0, 0.07);}.ace-chrome .ace_gutter-active-line {background-color : #dcdcdc;}.ace-chrome .ace_marker-layer .ace_selected-word {background: rgb(250, 250, 255);border: 1px solid rgb(200, 200, 250);}.ace-chrome .ace_storage,.ace-chrome .ace_keyword,.ace-chrome .ace_meta.ace_tag {color: rgb(147, 15, 128);}.ace-chrome .ace_string.ace_regex {color: rgb(255, 0, 0)}.ace-chrome .ace_string {color: #1A1AA6;}.ace-chrome .ace_entity.ace_other.ace_attribute-name {color: #994409;}.ace-chrome .ace_indent-guide {background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAACCAYAAACZgbYnAAAAE0lEQVQImWP4////f4bLly//BwAmVgd1/w11/gAAAABJRU5ErkJggg==") right repeat-y;}
/*# sourceURL=ace/css/ace-chrome */</style><script src="./app.blade_files/ext-searchbox.js.download"></script><style id="ace_searchbox">.ace_search {background-color: #ddd;color: #666;border: 1px solid #cbcbcb;border-top: 0 none;overflow: hidden;margin: 0;padding: 4px 6px 0 4px;position: absolute;top: 0;z-index: 99;white-space: normal;}.ace_search.left {border-left: 0 none;border-radius: 0px 0px 5px 0px;left: 0;}.ace_search.right {border-radius: 0px 0px 0px 5px;border-right: 0 none;right: 0;}.ace_search_form, .ace_replace_form {margin: 0 20px 4px 0;overflow: hidden;line-height: 1.9;}.ace_replace_form {margin-right: 0;}.ace_search_form.ace_nomatch {outline: 1px solid red;}.ace_search_field {border-radius: 3px 0 0 3px;background-color: white;color: black;border: 1px solid #cbcbcb;border-right: 0 none;box-sizing: border-box!important;outline: 0;padding: 0;font-size: inherit;margin: 0;line-height: inherit;padding: 0 6px;min-width: 17em;vertical-align: top;}.ace_searchbtn {border: 1px solid #cbcbcb;line-height: inherit;display: inline-block;padding: 0 6px;background: #fff;border-right: 0 none;border-left: 1px solid #dcdcdc;cursor: pointer;margin: 0;position: relative;box-sizing: content-box!important;color: #666;}.ace_searchbtn:last-child {border-radius: 0 3px 3px 0;border-right: 1px solid #cbcbcb;}.ace_searchbtn:disabled {background: none;cursor: default;}.ace_searchbtn:hover {background-color: #eef1f6;}.ace_searchbtn.prev, .ace_searchbtn.next {padding: 0px 0.7em}.ace_searchbtn.prev:after, .ace_searchbtn.next:after {content: "";border: solid 2px #888;width: 0.5em;height: 0.5em;border-width:  2px 0 0 2px;display:inline-block;transform: rotate(-45deg);}.ace_searchbtn.next:after {border-width: 0 2px 2px 0 ;}.ace_searchbtn_close {background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAcCAYAAABRVo5BAAAAZ0lEQVR42u2SUQrAMAhDvazn8OjZBilCkYVVxiis8H4CT0VrAJb4WHT3C5xU2a2IQZXJjiQIRMdkEoJ5Q2yMqpfDIo+XY4k6h+YXOyKqTIj5REaxloNAd0xiKmAtsTHqW8sR2W5f7gCu5nWFUpVjZwAAAABJRU5ErkJggg==) no-repeat 50% 0;border-radius: 50%;border: 0 none;color: #656565;cursor: pointer;font: 16px/16px Arial;padding: 0;height: 14px;width: 14px;top: 9px;right: 7px;position: absolute;}.ace_searchbtn_close:hover {background-color: #656565;background-position: 50% 100%;color: white;}.ace_button {margin-left: 2px;cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-o-user-select: none;-ms-user-select: none;user-select: none;overflow: hidden;opacity: 0.7;border: 1px solid rgba(100,100,100,0.23);padding: 1px;box-sizing:    border-box!important;color: black;}.ace_button:hover {background-color: #eee;opacity:1;}.ace_button:active {background-color: #ddd;}.ace_button.checked {border-color: #3399ff;opacity:1;}.ace_search_options{margin-bottom: 3px;text-align: right;-webkit-user-select: none;-moz-user-select: none;-o-user-select: none;-ms-user-select: none;user-select: none;clear: both;}.ace_search_counter {float: left;font-family: arial;padding: 0 8px;}
/*# sourceURL=ace/css/ace_searchbox */</style></head>
    <body class="nomargins yui-skin-sam" data-new-gr-c-s-check-loaded="14.984.0" data-gr-ext-installed="" data-new-gr-c-s-loaded="14.984.0" cz-shortcut-listen="true"><div class="mask" id="yui-gen10_mask" style="z-index: 2505; height: 856px; width: 1295px; display: none;">&nbsp;</div><div class="yui-panel-container cjt-progress-overlay throbber cjt_progress_panel_container yui-overlay-hidden" id="yui-gen10_c" style="z-index: 2506; visibility: hidden; left: 510px; top: 426px; overflow: hidden;"><div id="yui-gen10" class="yui-module yui-overlay yui-panel cjt_progress_panel" style="visibility: inherit;"><input style="position: absolute; top: 1px; outline: 0px; margin: 0px; border: 0px; padding: 0px; height: 1px; width: 1px; z-index: -1; opacity: 0;"><button tabindex="-1" style="height: 1px; width: 1px; position: absolute; left: -10000em; opacity: 0;"></button><div class="bd" style="border: 0px;" id="yui-gen11"><div class="cjt-progress-overlay-body-liner"><div class="loader-tool"><div class="loader"></div></div><div class="cjt-progress-overlay-text-container"><span class="cjt-progress-overlay-text cjt-fading-text-field">Saving “app.blade.php” …</span></div></div></div><input style="position: absolute; top: 1px; outline: 0px; margin: 0px; border: 0px; padding: 0px; height: 1px; width: 1px; z-index: -1; opacity: 0;"></div></div><div class="mask" id="yui-gen7_mask" style="z-index: 2503; height: 856px; width: 1295px; display: none;">&nbsp;</div><div class="yui-panel-container cjt-progress-overlay throbber cjt_progress_panel_container yui-overlay-hidden" id="yui-gen7_c" style="z-index: 2504; visibility: hidden; left: 510px; top: 426px; overflow: hidden;"><div id="yui-gen7" class="yui-module yui-overlay yui-panel cjt_progress_panel" style="visibility: inherit;"><input style="position: absolute; top: 1px; outline: 0px; margin: 0px; border: 0px; padding: 0px; height: 1px; width: 1px; z-index: -1; opacity: 0;"><button tabindex="-1" style="height: 1px; width: 1px; position: absolute; left: -10000em; opacity: 0;"></button><div class="bd" style="border: 0px;" id="yui-gen8"><div class="cjt-progress-overlay-body-liner"><div class="loader-tool"><div class="loader"></div></div><div class="cjt-progress-overlay-text-container"><span class="cjt-progress-overlay-text cjt-fading-text-field">Saving “app.blade.php” …</span></div></div></div><input style="position: absolute; top: 1px; outline: 0px; margin: 0px; border: 0px; padding: 0px; height: 1px; width: 1px; z-index: -1; opacity: 0;"></div></div><div class="mask" id="yui-gen3_mask" style="z-index: 2501; height: 856px; width: 1295px; display: none;">&nbsp;</div><div class="yui-panel-container cjt-progress-overlay throbber cjt_progress_panel_container yui-overlay-hidden" id="yui-gen3_c" style="z-index: 2502; visibility: hidden; left: 510px; top: 426px; overflow: hidden;"><div id="yui-gen3" class="yui-module yui-overlay yui-panel cjt_progress_panel" style="visibility: inherit;"><input style="position: absolute; top: 1px; outline: 0px; margin: 0px; border: 0px; padding: 0px; height: 1px; width: 1px; z-index: -1; opacity: 0;"><button tabindex="-1" style="height: 1px; width: 1px; position: absolute; left: -10000em; opacity: 0;"></button><div class="bd" style="border: 0px;" id="yui-gen4"><div class="cjt-progress-overlay-body-liner"><div class="loader-tool"><div class="loader"></div></div><div class="cjt-progress-overlay-text-container"><span class="cjt-progress-overlay-text cjt-fading-text-field">Saving “app.blade.php” …</span></div></div></div><input style="position: absolute; top: 1px; outline: 0px; margin: 0px; border: 0px; padding: 0px; height: 1px; width: 1px; z-index: -1; opacity: 0;"></div></div><iframe id="_yuiResizeMonitor" title="Text Resize Monitor" tabindex="-1" role="presentation" __idm_frm__="22308" style="position: absolute; visibility: visible; background-color: transparent; border-width: 0px; width: 2em; height: 2em; left: 0px; top: -29px;" src="./app.blade_files/saved_resource.html"></iframe><div class="mask" id="yui-gen0_mask" style="z-index: 2499; height: 856px; width: 1295px; display: none;">&nbsp;</div><div class="yui-panel-container cjt-progress-overlay throbber cjt_progress_panel_container yui-overlay-hidden" id="yui-gen0_c" style="z-index: 2500; visibility: hidden; left: 510px; top: 426px; overflow: hidden;"><div id="yui-gen0" class="yui-module yui-overlay yui-panel cjt_progress_panel" style="visibility: inherit;"><input style="position: absolute; top: 1px; outline: 0px; margin: 0px; border: 0px; padding: 0px; height: 1px; width: 1px; z-index: -1; opacity: 0;"><button tabindex="-1" style="height: 1px; width: 1px; position: absolute; left: -10000em; opacity: 0;"></button><div class="bd" style="border: 0px;" id="yui-gen1"><div class="cjt-progress-overlay-body-liner"><div class="loader-tool"><div class="loader"></div></div><div class="cjt-progress-overlay-text-container"><span class="cjt-progress-overlay-text cjt-fading-text-field">Saving “app.blade.php” …</span></div></div></div><input style="position: absolute; top: 1px; outline: 0px; margin: 0px; border: 0px; padding: 0px; height: 1px; width: 1px; z-index: -1; opacity: 0;"></div></div>
        <form action="javascript:void(0)" name="sform" onsubmit="loadfdata(&#39;sform_submit&#39;); return false;" class="form-inline">
            <table border="0" id="maintbl">
                <tbody><tr class="header">
                    <td style="padding: 5px">
                        <div class="row">
                            <div class="col-xs-12 col-md-8">
                                <label style="font-weight: 900; font-size:13px;">
                                    Editing:
                                    <input id="path" name="path" value="/home/devsbeta/stylensmile.pk/resources/views/frontend/layouts/app.blade.php" class="form-control">
                                </label>
                                <label>Encoding:
                                    <select id="charset" name="charset" class="form-control">
                                    
                                        
                                            <option value="ansi_x3.110-1983">
                                                ansi_x3.110-1983
                                            </option>
                                        
                                            <option value="ansi_x3.4-1968">
                                                ansi_x3.4-1968
                                            </option>
                                        
                                            <option value="armscii-8">
                                                armscii-8
                                            </option>
                                        
                                            <option value="asmo_449">
                                                asmo_449
                                            </option>
                                        
                                            <option value="big5">
                                                big5
                                            </option>
                                        
                                            <option value="big5-hkscs">
                                                big5-hkscs
                                            </option>
                                        
                                            <option value="brf">
                                                brf
                                            </option>
                                        
                                            <option value="bs_4730">
                                                bs_4730
                                            </option>
                                        
                                            <option value="bs_viewdata">
                                                bs_viewdata
                                            </option>
                                        
                                            <option value="cp10007">
                                                cp10007
                                            </option>
                                        
                                            <option value="cp1125">
                                                cp1125
                                            </option>
                                        
                                            <option value="cp1250">
                                                cp1250
                                            </option>
                                        
                                            <option value="cp1253">
                                                cp1253
                                            </option>
                                        
                                            <option value="cp1254">
                                                cp1254
                                            </option>
                                        
                                            <option value="cp1255">
                                                cp1255
                                            </option>
                                        
                                            <option value="cp1256">
                                                cp1256
                                            </option>
                                        
                                            <option value="cp1257">
                                                cp1257
                                            </option>
                                        
                                            <option value="cp1258">
                                                cp1258
                                            </option>
                                        
                                            <option value="cp737">
                                                cp737
                                            </option>
                                        
                                            <option value="cp770">
                                                cp770
                                            </option>
                                        
                                            <option value="cp771">
                                                cp771
                                            </option>
                                        
                                            <option value="cp772">
                                                cp772
                                            </option>
                                        
                                            <option value="cp773">
                                                cp773
                                            </option>
                                        
                                            <option value="cp774">
                                                cp774
                                            </option>
                                        
                                            <option value="cp775">
                                                cp775
                                            </option>
                                        
                                            <option value="csa_z243.4-1985-1">
                                                csa_z243.4-1985-1
                                            </option>
                                        
                                            <option value="csa_z243.4-1985-2">
                                                csa_z243.4-1985-2
                                            </option>
                                        
                                            <option value="csa_z243.4-1985-gr">
                                                csa_z243.4-1985-gr
                                            </option>
                                        
                                            <option value="csn_369103">
                                                csn_369103
                                            </option>
                                        
                                            <option value="cwi">
                                                cwi
                                            </option>
                                        
                                            <option value="dec-mcs">
                                                dec-mcs
                                            </option>
                                        
                                            <option value="din_66003">
                                                din_66003
                                            </option>
                                        
                                            <option value="ds_2089">
                                                ds_2089
                                            </option>
                                        
                                            <option value="ebcdic-at-de">
                                                ebcdic-at-de
                                            </option>
                                        
                                            <option value="ebcdic-at-de-a">
                                                ebcdic-at-de-a
                                            </option>
                                        
                                            <option value="ebcdic-ca-fr">
                                                ebcdic-ca-fr
                                            </option>
                                        
                                            <option value="ebcdic-dk-no">
                                                ebcdic-dk-no
                                            </option>
                                        
                                            <option value="ebcdic-dk-no-a">
                                                ebcdic-dk-no-a
                                            </option>
                                        
                                            <option value="ebcdic-es">
                                                ebcdic-es
                                            </option>
                                        
                                            <option value="ebcdic-es-a">
                                                ebcdic-es-a
                                            </option>
                                        
                                            <option value="ebcdic-es-s">
                                                ebcdic-es-s
                                            </option>
                                        
                                            <option value="ebcdic-fi-se">
                                                ebcdic-fi-se
                                            </option>
                                        
                                            <option value="ebcdic-fi-se-a">
                                                ebcdic-fi-se-a
                                            </option>
                                        
                                            <option value="ebcdic-fr">
                                                ebcdic-fr
                                            </option>
                                        
                                            <option value="ebcdic-is-friss">
                                                ebcdic-is-friss
                                            </option>
                                        
                                            <option value="ebcdic-it">
                                                ebcdic-it
                                            </option>
                                        
                                            <option value="ebcdic-pt">
                                                ebcdic-pt
                                            </option>
                                        
                                            <option value="ebcdic-uk">
                                                ebcdic-uk
                                            </option>
                                        
                                            <option value="ebcdic-us">
                                                ebcdic-us
                                            </option>
                                        
                                            <option value="ecma-cyrillic">
                                                ecma-cyrillic
                                            </option>
                                        
                                            <option value="es">
                                                es
                                            </option>
                                        
                                            <option value="es2">
                                                es2
                                            </option>
                                        
                                            <option value="euc-jisx0213">
                                                euc-jisx0213
                                            </option>
                                        
                                            <option value="euc-jp">
                                                euc-jp
                                            </option>
                                        
                                            <option value="euc-jp-ms">
                                                euc-jp-ms
                                            </option>
                                        
                                            <option value="euc-kr">
                                                euc-kr
                                            </option>
                                        
                                            <option value="euc-tw">
                                                euc-tw
                                            </option>
                                        
                                            <option value="gb18030">
                                                gb18030
                                            </option>
                                        
                                            <option value="gb2312">
                                                gb2312
                                            </option>
                                        
                                            <option value="gb_1988-80">
                                                gb_1988-80
                                            </option>
                                        
                                            <option value="gbk">
                                                gbk
                                            </option>
                                        
                                            <option value="georgian-academy">
                                                georgian-academy
                                            </option>
                                        
                                            <option value="georgian-ps">
                                                georgian-ps
                                            </option>
                                        
                                            <option value="gost_19768-74">
                                                gost_19768-74
                                            </option>
                                        
                                            <option value="greek-ccitt">
                                                greek-ccitt
                                            </option>
                                        
                                            <option value="greek7">
                                                greek7
                                            </option>
                                        
                                            <option value="greek7-old">
                                                greek7-old
                                            </option>
                                        
                                            <option value="gsm03.38">
                                                gsm03.38
                                            </option>
                                        
                                            <option value="hp-greek8">
                                                hp-greek8
                                            </option>
                                        
                                            <option value="hp-roman8">
                                                hp-roman8
                                            </option>
                                        
                                            <option value="hp-roman9">
                                                hp-roman9
                                            </option>
                                        
                                            <option value="hp-thai8">
                                                hp-thai8
                                            </option>
                                        
                                            <option value="hp-turkish8">
                                                hp-turkish8
                                            </option>
                                        
                                            <option value="hz-gb-2312">
                                                hz-gb-2312
                                            </option>
                                        
                                            <option value="ibm037">
                                                ibm037
                                            </option>
                                        
                                            <option value="ibm038">
                                                ibm038
                                            </option>
                                        
                                            <option value="ibm1004">
                                                ibm1004
                                            </option>
                                        
                                            <option value="ibm1026">
                                                ibm1026
                                            </option>
                                        
                                            <option value="ibm1047">
                                                ibm1047
                                            </option>
                                        
                                            <option value="ibm1124">
                                                ibm1124
                                            </option>
                                        
                                            <option value="ibm1129">
                                                ibm1129
                                            </option>
                                        
                                            <option value="ibm1132">
                                                ibm1132
                                            </option>
                                        
                                            <option value="ibm1133">
                                                ibm1133
                                            </option>
                                        
                                            <option value="ibm1160">
                                                ibm1160
                                            </option>
                                        
                                            <option value="ibm1161">
                                                ibm1161
                                            </option>
                                        
                                            <option value="ibm1162">
                                                ibm1162
                                            </option>
                                        
                                            <option value="ibm1163">
                                                ibm1163
                                            </option>
                                        
                                            <option value="ibm1164">
                                                ibm1164
                                            </option>
                                        
                                            <option value="ibm256">
                                                ibm256
                                            </option>
                                        
                                            <option value="ibm273">
                                                ibm273
                                            </option>
                                        
                                            <option value="ibm274">
                                                ibm274
                                            </option>
                                        
                                            <option value="ibm275">
                                                ibm275
                                            </option>
                                        
                                            <option value="ibm277">
                                                ibm277
                                            </option>
                                        
                                            <option value="ibm278">
                                                ibm278
                                            </option>
                                        
                                            <option value="ibm280">
                                                ibm280
                                            </option>
                                        
                                            <option value="ibm281">
                                                ibm281
                                            </option>
                                        
                                            <option value="ibm284">
                                                ibm284
                                            </option>
                                        
                                            <option value="ibm285">
                                                ibm285
                                            </option>
                                        
                                            <option value="ibm290">
                                                ibm290
                                            </option>
                                        
                                            <option value="ibm297">
                                                ibm297
                                            </option>
                                        
                                            <option value="ibm420">
                                                ibm420
                                            </option>
                                        
                                            <option value="ibm423">
                                                ibm423
                                            </option>
                                        
                                            <option value="ibm424">
                                                ibm424
                                            </option>
                                        
                                            <option value="ibm437">
                                                ibm437
                                            </option>
                                        
                                            <option value="ibm500">
                                                ibm500
                                            </option>
                                        
                                            <option value="ibm850">
                                                ibm850
                                            </option>
                                        
                                            <option value="ibm851">
                                                ibm851
                                            </option>
                                        
                                            <option value="ibm852">
                                                ibm852
                                            </option>
                                        
                                            <option value="ibm855">
                                                ibm855
                                            </option>
                                        
                                            <option value="ibm856">
                                                ibm856
                                            </option>
                                        
                                            <option value="ibm857">
                                                ibm857
                                            </option>
                                        
                                            <option value="ibm858">
                                                ibm858
                                            </option>
                                        
                                            <option value="ibm860">
                                                ibm860
                                            </option>
                                        
                                            <option value="ibm861">
                                                ibm861
                                            </option>
                                        
                                            <option value="ibm862">
                                                ibm862
                                            </option>
                                        
                                            <option value="ibm863">
                                                ibm863
                                            </option>
                                        
                                            <option value="ibm864">
                                                ibm864
                                            </option>
                                        
                                            <option value="ibm865">
                                                ibm865
                                            </option>
                                        
                                            <option value="ibm866">
                                                ibm866
                                            </option>
                                        
                                            <option value="ibm866nav">
                                                ibm866nav
                                            </option>
                                        
                                            <option value="ibm868">
                                                ibm868
                                            </option>
                                        
                                            <option value="ibm869">
                                                ibm869
                                            </option>
                                        
                                            <option value="ibm870">
                                                ibm870
                                            </option>
                                        
                                            <option value="ibm871">
                                                ibm871
                                            </option>
                                        
                                            <option value="ibm874">
                                                ibm874
                                            </option>
                                        
                                            <option value="ibm875">
                                                ibm875
                                            </option>
                                        
                                            <option value="ibm880">
                                                ibm880
                                            </option>
                                        
                                            <option value="ibm891">
                                                ibm891
                                            </option>
                                        
                                            <option value="ibm903">
                                                ibm903
                                            </option>
                                        
                                            <option value="ibm904">
                                                ibm904
                                            </option>
                                        
                                            <option value="ibm905">
                                                ibm905
                                            </option>
                                        
                                            <option value="ibm918">
                                                ibm918
                                            </option>
                                        
                                            <option value="ibm922">
                                                ibm922
                                            </option>
                                        
                                            <option value="iec_p27-1">
                                                iec_p27-1
                                            </option>
                                        
                                            <option value="inis">
                                                inis
                                            </option>
                                        
                                            <option value="inis-8">
                                                inis-8
                                            </option>
                                        
                                            <option value="inis-cyrillic">
                                                inis-cyrillic
                                            </option>
                                        
                                            <option value="invariant">
                                                invariant
                                            </option>
                                        
                                            <option value="isiri-3342">
                                                isiri-3342
                                            </option>
                                        
                                            <option value="iso-8859-1">
                                                iso-8859-1
                                            </option>
                                        
                                            <option value="iso-8859-10">
                                                iso-8859-10
                                            </option>
                                        
                                            <option value="iso-8859-11">
                                                iso-8859-11
                                            </option>
                                        
                                            <option value="iso-8859-13">
                                                iso-8859-13
                                            </option>
                                        
                                            <option value="iso-8859-14">
                                                iso-8859-14
                                            </option>
                                        
                                            <option value="iso-8859-15">
                                                iso-8859-15
                                            </option>
                                        
                                            <option value="iso-8859-16">
                                                iso-8859-16
                                            </option>
                                        
                                            <option value="iso-8859-2">
                                                iso-8859-2
                                            </option>
                                        
                                            <option value="iso-8859-3">
                                                iso-8859-3
                                            </option>
                                        
                                            <option value="iso-8859-4">
                                                iso-8859-4
                                            </option>
                                        
                                            <option value="iso-8859-5">
                                                iso-8859-5
                                            </option>
                                        
                                            <option value="iso-8859-6">
                                                iso-8859-6
                                            </option>
                                        
                                            <option value="iso-8859-7">
                                                iso-8859-7
                                            </option>
                                        
                                            <option value="iso-8859-8">
                                                iso-8859-8
                                            </option>
                                        
                                            <option value="iso-8859-9">
                                                iso-8859-9
                                            </option>
                                        
                                            <option value="iso-8859-9e">
                                                iso-8859-9e
                                            </option>
                                        
                                            <option value="iso-ir-197">
                                                iso-ir-197
                                            </option>
                                        
                                            <option value="iso-ir-209">
                                                iso-ir-209
                                            </option>
                                        
                                            <option value="iso-ir-90">
                                                iso-ir-90
                                            </option>
                                        
                                            <option value="iso_10367-box">
                                                iso_10367-box
                                            </option>
                                        
                                            <option value="iso_10646">
                                                iso_10646
                                            </option>
                                        
                                            <option value="iso_11548-1">
                                                iso_11548-1
                                            </option>
                                        
                                            <option value="iso_2033-1983">
                                                iso_2033-1983
                                            </option>
                                        
                                            <option value="iso_5427">
                                                iso_5427
                                            </option>
                                        
                                            <option value="iso_5427-ext">
                                                iso_5427-ext
                                            </option>
                                        
                                            <option value="iso_5428">
                                                iso_5428
                                            </option>
                                        
                                            <option value="iso_646.basic">
                                                iso_646.basic
                                            </option>
                                        
                                            <option value="iso_646.irv">
                                                iso_646.irv
                                            </option>
                                        
                                            <option value="iso_6937">
                                                iso_6937
                                            </option>
                                        
                                            <option value="iso_6937-2-25">
                                                iso_6937-2-25
                                            </option>
                                        
                                            <option value="iso_6937-2-add">
                                                iso_6937-2-add
                                            </option>
                                        
                                            <option value="iso_8859-1,gl">
                                                iso_8859-1,gl
                                            </option>
                                        
                                            <option value="iso_8859-supp">
                                                iso_8859-supp
                                            </option>
                                        
                                            <option value="it">
                                                it
                                            </option>
                                        
                                            <option value="jis_c6220-1969-jp">
                                                jis_c6220-1969-jp
                                            </option>
                                        
                                            <option value="jis_c6220-1969-ro">
                                                jis_c6220-1969-ro
                                            </option>
                                        
                                            <option value="jis_c6229-1984-a">
                                                jis_c6229-1984-a
                                            </option>
                                        
                                            <option value="jis_c6229-1984-b">
                                                jis_c6229-1984-b
                                            </option>
                                        
                                            <option value="jis_c6229-1984-b-add">
                                                jis_c6229-1984-b-add
                                            </option>
                                        
                                            <option value="jis_c6229-1984-hand">
                                                jis_c6229-1984-hand
                                            </option>
                                        
                                            <option value="jis_c6229-1984-hand-add">
                                                jis_c6229-1984-hand-add
                                            </option>
                                        
                                            <option value="jis_c6229-1984-kana">
                                                jis_c6229-1984-kana
                                            </option>
                                        
                                            <option value="jis_x0201">
                                                jis_x0201
                                            </option>
                                        
                                            <option value="johab">
                                                johab
                                            </option>
                                        
                                            <option value="jus_i.b1.002">
                                                jus_i.b1.002
                                            </option>
                                        
                                            <option value="jus_i.b1.003-mac">
                                                jus_i.b1.003-mac
                                            </option>
                                        
                                            <option value="jus_i.b1.003-serb">
                                                jus_i.b1.003-serb
                                            </option>
                                        
                                            <option value="koi-8">
                                                koi-8
                                            </option>
                                        
                                            <option value="koi8-r">
                                                koi8-r
                                            </option>
                                        
                                            <option value="koi8-ru">
                                                koi8-ru
                                            </option>
                                        
                                            <option value="koi8-t">
                                                koi8-t
                                            </option>
                                        
                                            <option value="koi8-u">
                                                koi8-u
                                            </option>
                                        
                                            <option value="ks_c_5601-1987">
                                                ks_c_5601-1987
                                            </option>
                                        
                                            <option value="ksc5636">
                                                ksc5636
                                            </option>
                                        
                                            <option value="latin-greek">
                                                latin-greek
                                            </option>
                                        
                                            <option value="latin-greek-1">
                                                latin-greek-1
                                            </option>
                                        
                                            <option value="mac-centraleurope">
                                                mac-centraleurope
                                            </option>
                                        
                                            <option value="mac-cyrillic">
                                                mac-cyrillic
                                            </option>
                                        
                                            <option value="mac-is">
                                                mac-is
                                            </option>
                                        
                                            <option value="mac-sami">
                                                mac-sami
                                            </option>
                                        
                                            <option value="mac-uk">
                                                mac-uk
                                            </option>
                                        
                                            <option value="macintosh">
                                                macintosh
                                            </option>
                                        
                                            <option value="mik">
                                                mik
                                            </option>
                                        
                                            <option value="msz_7795.3">
                                                msz_7795.3
                                            </option>
                                        
                                            <option value="nats-dano">
                                                nats-dano
                                            </option>
                                        
                                            <option value="nats-dano-add">
                                                nats-dano-add
                                            </option>
                                        
                                            <option value="nats-sefi">
                                                nats-sefi
                                            </option>
                                        
                                            <option value="nats-sefi-add">
                                                nats-sefi-add
                                            </option>
                                        
                                            <option value="nc_nc00-10">
                                                nc_nc00-10
                                            </option>
                                        
                                            <option value="nextstep">
                                                nextstep
                                            </option>
                                        
                                            <option value="nf_z_62-010">
                                                nf_z_62-010
                                            </option>
                                        
                                            <option value="nf_z_62-010_1973">
                                                nf_z_62-010_1973
                                            </option>
                                        
                                            <option value="ns_4551-1">
                                                ns_4551-1
                                            </option>
                                        
                                            <option value="ns_4551-2">
                                                ns_4551-2
                                            </option>
                                        
                                            <option value="pt">
                                                pt
                                            </option>
                                        
                                            <option value="pt154">
                                                pt154
                                            </option>
                                        
                                            <option value="pt2">
                                                pt2
                                            </option>
                                        
                                            <option value="rk1048">
                                                rk1048
                                            </option>
                                        
                                            <option value="sami">
                                                sami
                                            </option>
                                        
                                            <option value="sami-ws2">
                                                sami-ws2
                                            </option>
                                        
                                            <option value="sen_850200_b">
                                                sen_850200_b
                                            </option>
                                        
                                            <option value="sen_850200_c">
                                                sen_850200_c
                                            </option>
                                        
                                            <option value="shift_jis">
                                                shift_jis
                                            </option>
                                        
                                            <option value="shift_jisx0213">
                                                shift_jisx0213
                                            </option>
                                        
                                            <option value="t.101-g2">
                                                t.101-g2
                                            </option>
                                        
                                            <option value="t.61-7bit">
                                                t.61-7bit
                                            </option>
                                        
                                            <option value="t.61-8bit">
                                                t.61-8bit
                                            </option>
                                        
                                            <option value="tcvn5712-1">
                                                tcvn5712-1
                                            </option>
                                        
                                            <option value="tis-620">
                                                tis-620
                                            </option>
                                        
                                            <option value="tscii">
                                                tscii
                                            </option>
                                        
                                            <option value="us-ascii">
                                                us-ascii
                                            </option>
                                        
                                            <option value="utf-7">
                                                utf-7
                                            </option>
                                        
                                            <option value="utf-8" selected="">
                                                utf-8
                                            </option>
                                        
                                            <option value="videotex-suppl">
                                                videotex-suppl
                                            </option>
                                        
                                            <option value="viscii">
                                                viscii
                                            </option>
                                        
                                            <option value="windows-1251">
                                                windows-1251
                                            </option>
                                        
                                            <option value="windows-1252">
                                                windows-1252
                                            </option>
                                        
                                            <option value="windows-31j">
                                                windows-31j
                                            </option>
                                        
                                    
                                    </select>
                                </label>
                                <input type="button" onclick="loadfile(this);" class="btn btn-default" value="Re-open" id="btnReOpen">
                            </div>
                            <div class="col-xs-12 col-md-4 action-buttons">
                                <button type="button" class="btn btn-default" id="switch_editor_control" onclick="try {toggle_EditArea(this)} catch(e) {} return false" title="Switch to legacy editor.">Use legacy editor</button>
                                &nbsp;
                                <button type="submit" id="sform_submit" class="btn btn-primary" style="font-weight:bold">
                                    Save Changes
                                </button>
                                <input type="button" onclick="confirm_close(this);" class="btn btn-default" value="Close" id="btnClose">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="show-ace-editor">
                    <td>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <a href="https://github.com/ajaxorg/ace/wiki/Default-Keyboard-Shortcuts" target="_blank" class="help-link">
                                    <span class="fas fa-external-link-alt"></span>
                                    Keyboard shortcuts
                                </a>
                            </div>
                            <!-- Editor Toolbar -->
                            <div class="col-xs-12 col-sm-8">
                                <div class="btn-toolbar editor-toolbar" role="toolbar">
                                    <div class="btn-group" role="group">
                                        <button id="btnSearch" type="button" onclick="toolbarActions(&#39;search&#39;)" class="btn btn-default" title="Search">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button id="btnGoto" type="button" onclick="toolbarActions(&#39;goto&#39;)" class="btn btn-default" title="Go to line.">
                                            <i class="fas fa-terminal"></i>
                                        </button>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <button id="btnUndo" type="button" onclick="toolbarActions(&#39;undo&#39;)" class="btn btn-default" title="Undo">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                        <button id="btnRedo" type="button" onclick="toolbarActions(&#39;redo&#39;)" class="btn btn-default" title="Redo">
                                            <i class="fas fa-redo"></i>
                                        </button>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <button id="btnLineWrap" type="button" onclick="toolbarActions(&#39;linewrap&#39;)" class="btn btn-default active" title="Wrap">
                                            <i class="fas fa-arrows-alt-h"></i>
                                        </button>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <select id="ddlFontSizes" class="btn btn-default form-control btn-group-ddl">
                                        <option value="10">10px</option><option value="11">11px</option><option value="12">12px</option><option value="13">13px</option><option value="14">14px</option><option value="16">16px</option><option value="18">18px</option><option value="20">20px</option><option value="24">24px</option></select>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <select id="ddlModes" class="btn btn-default form-control btn-group-ddl">
                                        <option value="abap">ABAP</option><option value="abc">ABC</option><option value="actionscript">ActionScript</option><option value="ada">ADA</option><option value="apache_conf">Apache Conf</option><option value="asciidoc">AsciiDoc</option><option value="assembly_x86">Assembly x86</option><option value="autohotkey">AutoHotKey</option><option value="batchfile">BatchFile</option><option value="bro">Bro</option><option value="c_cpp">C and C++</option><option value="c9search">C9Search</option><option value="cirru">Cirru</option><option value="clojure">Clojure</option><option value="cobol">Cobol</option><option value="coffee">CoffeeScript</option><option value="coldfusion">ColdFusion</option><option value="csharp">C#</option><option value="csound_document">Csound Document</option><option value="csound_orchestra">Csound</option><option value="csound_score">Csound Score</option><option value="css">CSS</option><option value="curly">Curly</option><option value="d">D</option><option value="dart">Dart</option><option value="diff">Diff</option><option value="dockerfile">Dockerfile</option><option value="dot">Dot</option><option value="drools">Drools</option><option value="edifact">Edifact</option><option value="eiffel">Eiffel</option><option value="ejs">EJS</option><option value="elixir">Elixir</option><option value="elm">Elm</option><option value="erlang">Erlang</option><option value="forth">Forth</option><option value="fortran">Fortran</option><option value="ftl">FreeMarker</option><option value="gcode">Gcode</option><option value="gherkin">Gherkin</option><option value="gitignore">Gitignore</option><option value="glsl">Glsl</option><option value="gobstones">Gobstones</option><option value="golang">Go</option><option value="graphqlschema">GraphQLSchema</option><option value="groovy">Groovy</option><option value="haml">HAML</option><option value="handlebars">Handlebars</option><option value="haskell">Haskell</option><option value="haskell_cabal">Haskell Cabal</option><option value="haxe">haXe</option><option value="hjson">Hjson</option><option value="html">HTML</option><option value="html_elixir">HTML (Elixir)</option><option value="html_ruby">HTML (Ruby)</option><option value="ini">INI</option><option value="io">Io</option><option value="jack">Jack</option><option value="jade">Jade</option><option value="java">Java</option><option value="javascript">JavaScript</option><option value="json">JSON</option><option value="jsoniq">JSONiq</option><option value="jsp">JSP</option><option value="jssm">JSSM</option><option value="jsx">JSX</option><option value="julia">Julia</option><option value="kotlin">Kotlin</option><option value="latex">LaTeX</option><option value="less">LESS</option><option value="liquid">Liquid</option><option value="lisp">Lisp</option><option value="livescript">LiveScript</option><option value="logiql">LogiQL</option><option value="lsl">LSL</option><option value="lua">Lua</option><option value="luapage">LuaPage</option><option value="lucene">Lucene</option><option value="makefile">Makefile</option><option value="markdown">Markdown</option><option value="mask">Mask</option><option value="matlab">MATLAB</option><option value="maze">Maze</option><option value="mel">MEL</option><option value="mixal">MIXAL</option><option value="mushcode">MUSHCode</option><option value="mysql">MySQL</option><option value="nix">Nix</option><option value="nsis">NSIS</option><option value="objectivec">Objective-C</option><option value="ocaml">OCaml</option><option value="pascal">Pascal</option><option value="perl">Perl</option><option value="pgsql">pgSQL</option><option value="php">PHP</option><option value="pig">Pig</option><option value="powershell">Powershell</option><option value="praat">Praat</option><option value="prolog">Prolog</option><option value="properties">Properties</option><option value="protobuf">Protobuf</option><option value="python">Python</option><option value="r">R</option><option value="razor">Razor</option><option value="rdoc">RDoc</option><option value="red">Red</option><option value="rhtml">RHTML</option><option value="rst">RST</option><option value="ruby">Ruby</option><option value="rust">Rust</option><option value="sass">SASS</option><option value="scad">SCAD</option><option value="scala">Scala</option><option value="scheme">Scheme</option><option value="scss">SCSS</option><option value="sh">SH</option><option value="sjs">SJS</option><option value="smarty">Smarty</option><option value="snippets">snippets</option><option value="soy_template">Soy Template</option><option value="space">Space</option><option value="sql">SQL</option><option value="sqlserver">SQLServer</option><option value="stylus">Stylus</option><option value="svg">SVG</option><option value="swift">Swift</option><option value="tcl">Tcl</option><option value="tex">Tex</option><option value="text">Text</option><option value="textile">Textile</option><option value="toml">Toml</option><option value="tsx">TSX</option><option value="twig">Twig</option><option value="typescript">Typescript</option><option value="vala">Vala</option><option value="vbscript">VBScript</option><option value="velocity">Velocity</option><option value="verilog">Verilog</option><option value="vhdl">VHDL</option><option value="wollok">Wollok</option><option value="xml">XML</option><option value="xquery">XQuery</option><option value="yaml">YAML</option><option value="django">Django</option></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td id="codewindow_container">
                        <!-- Editor -->
                        <div id="codewindow" class="show-ace-editor editor-area ace_editor ace-chrome ace_focus" style="font-size: 18px;"><textarea class="ace_text-input" wrap="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="opacity: 0; left: 571.721px; height: 22px; width: 9.89648px; top: 225px;"></textarea><div class="ace_gutter" aria-hidden="true"><div class="ace_layer ace_gutter-layer ace_folding-enabled" style="margin-top: -17px; height: 784px; width: 63px;"><div class="ace_gutter-cell " style="height: 22px;">86</div><div class="ace_gutter-cell " style="height: 22px;">87</div><div class="ace_gutter-cell " style="height: 22px;">88</div><div class="ace_gutter-cell " style="height: 22px;">89</div><div class="ace_gutter-cell " style="height: 22px;">90</div><div class="ace_gutter-cell " style="height: 22px;">91</div><div class="ace_gutter-cell " style="height: 22px;">92<span class="ace_fold-widget ace_start ace_open" style="height: 22px;"></span></div><div class="ace_gutter-cell " style="height: 22px;">93</div><div class="ace_gutter-cell " style="height: 22px;">94<span class="ace_fold-widget ace_start ace_open" style="height: 22px;"></span></div><div class="ace_gutter-cell " style="height: 22px;">95</div><div class="ace_gutter-cell " style="height: 22px;">96</div><div class="ace_gutter-cell " style="height: 22px;">97</div><div class="ace_gutter-cell " style="height: 22px;">98</div><div class="ace_gutter-cell " style="height: 22px;">99<span class="ace_fold-widget ace_start ace_open" style="height: 22px;"></span></div><div class="ace_gutter-cell " style="height: 22px;">100</div><div class="ace_gutter-cell " style="height: 22px;">101</div><div class="ace_gutter-cell " style="height: 22px;">102</div><div class="ace_gutter-cell " style="height: 22px;">103</div><div class="ace_gutter-cell " style="height: 22px;">104<span class="ace_fold-widget ace_start ace_open" style="height: 22px;"></span></div><div class="ace_gutter-cell " style="height: 44px;">105</div><div class="ace_gutter-cell " style="height: 22px;">106</div><div class="ace_gutter-cell " style="height: 22px;">107</div><div class="ace_gutter-cell " style="height: 22px;">108</div><div class="ace_gutter-cell " style="height: 22px;">109</div><div class="ace_gutter-cell " style="height: 22px;">110<span class="ace_fold-widget ace_start ace_open" style="height: 22px;"></span></div><div class="ace_gutter-cell " style="height: 22px;">111<span class="ace_fold-widget ace_start ace_open" style="height: 22px;"></span></div><div class="ace_gutter-cell " style="height: 22px;">112</div><div class="ace_gutter-cell " style="height: 22px;">113</div><div class="ace_gutter-cell " style="height: 22px;">114<span class="ace_fold-widget ace_start ace_open" style="height: 22px;"></span></div><div class="ace_gutter-cell " style="height: 44px;">115</div><div class="ace_gutter-cell " style="height: 44px;">116</div><div class="ace_gutter-cell " style="height: 22px;">117</div><div class="ace_gutter-cell " style="height: 22px;">118</div></div><div class="ace_gutter-active-line" style="top: 225px; height: 22px;"></div></div><div class="ace_scroller" style="left: 63px; right: 17px; bottom: 0px;"><div class="ace_content" style="margin-top: -17px; width: 1198px; height: 784px; margin-left: 0px;"><div class="ace_layer ace_print-margin-layer"><div class="ace_print-margin" style="left: 796px; visibility: visible;"></div></div><div class="ace_layer ace_marker-layer"><div class="ace_active-line" style="height:22px;top:242px;left:0;right:0;"></div></div><div class="ace_layer ace_text-layer" style="padding: 0px 4px;"><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_identifier">gtag</span><span class="ace_paren ace_lparen">(</span><span class="ace_string">'config'</span><span class="ace_punctuation ace_operator">,</span> <span class="ace_string">'{{ env('</span><span class="ace_identifier">TRACKING_ID</span><span class="ace_string">') }}'</span><span class="ace_paren ace_rparen">)</span><span class="ace_punctuation ace_operator">;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px">    <span class="ace_meta ace_tag ace_punctuation ace_end-tag-open ace_xml">&lt;/</span><span class="ace_meta ace_tag ace_script ace_tag-name ace_xml">script</span><span class="ace_meta ace_tag ace_punctuation ace_tag-close ace_xml">&gt;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_text ace_xml">@endif</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_text ace_xml">@if (\App\BusinessSetting::where('type', 'facebook_pixel')-&gt;first()-&gt;value == 1)</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_text ace_xml">    </span><span class="ace_comment ace_start ace_xml">&lt;!--</span><span class="ace_comment ace_xml"> Facebook Pixel Code </span><span class="ace_comment ace_end ace_xml">--&gt;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_text ace_xml">    </span><span class="ace_meta ace_tag ace_punctuation ace_tag-open ace_xml">&lt;</span><span class="ace_meta ace_tag ace_script ace_tag-name ace_xml">script</span><span class="ace_meta ace_tag ace_punctuation ace_tag-close ace_xml">&gt;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_keyword ace_operator">!</span><span class="ace_storage ace_type">function</span><span class="ace_paren ace_lparen">(</span><span class="ace_identifier">f</span><span class="ace_punctuation ace_operator">,</span><span class="ace_identifier">b</span><span class="ace_punctuation ace_operator">,</span><span class="ace_identifier">e</span><span class="ace_punctuation ace_operator">,</span><span class="ace_identifier">v</span><span class="ace_punctuation ace_operator">,</span><span class="ace_identifier">n</span><span class="ace_punctuation ace_operator">,</span><span class="ace_identifier">t</span><span class="ace_punctuation ace_operator">,</span><span class="ace_identifier">s</span><span class="ace_paren ace_rparen">)</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_paren ace_lparen">{</span><span class="ace_keyword">if</span><span class="ace_paren ace_lparen">(</span><span class="ace_identifier">f</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">fbq</span><span class="ace_paren ace_rparen">)</span><span class="ace_keyword">return</span><span class="ace_punctuation ace_operator">;</span><span class="ace_identifier">n</span><span class="ace_keyword ace_operator">=</span><span class="ace_storage ace_type">f</span><span class="ace_punctuation ace_operator">.</span><span class="ace_entity ace_name ace_function">fbq</span><span class="ace_keyword ace_operator">=</span><span class="ace_storage ace_type">function</span><span class="ace_paren ace_lparen">(</span><span class="ace_paren ace_rparen">)</span><span class="ace_paren ace_lparen">{</span><span class="ace_identifier">n</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">callMethod</span><span class="ace_punctuation ace_operator">?</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_identifier">n</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">callMethod</span><span class="ace_punctuation ace_operator">.</span><span class="ace_support ace_function">apply</span><span class="ace_paren ace_lparen">(</span><span class="ace_identifier">n</span><span class="ace_punctuation ace_operator">,</span><span class="ace_variable ace_language">arguments</span><span class="ace_paren ace_rparen">)</span><span class="ace_punctuation ace_operator">:</span><span class="ace_identifier">n</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">queue</span><span class="ace_punctuation ace_operator">.</span><span class="ace_support ace_function">push</span><span class="ace_paren ace_lparen">(</span><span class="ace_variable ace_language">arguments</span><span class="ace_paren ace_rparen">)}</span><span class="ace_punctuation ace_operator">;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_keyword">if</span><span class="ace_paren ace_lparen">(</span><span class="ace_keyword ace_operator">!</span><span class="ace_identifier">f</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">_fbq</span><span class="ace_paren ace_rparen">)</span><span class="ace_identifier">f</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">_fbq</span><span class="ace_keyword ace_operator">=</span><span class="ace_identifier">n</span><span class="ace_punctuation ace_operator">;</span><span class="ace_identifier">n</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">push</span><span class="ace_keyword ace_operator">=</span><span class="ace_identifier">n</span><span class="ace_punctuation ace_operator">;</span><span class="ace_identifier">n</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">loaded</span><span class="ace_keyword ace_operator">=!</span><span class="ace_constant ace_numeric">0</span><span class="ace_punctuation ace_operator">;</span><span class="ace_identifier">n</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">version</span><span class="ace_keyword ace_operator">=</span><span class="ace_string">'2.0'</span><span class="ace_punctuation ace_operator">;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_identifier">n</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">queue</span><span class="ace_keyword ace_operator">=</span><span class="ace_paren ace_lparen">[</span><span class="ace_paren ace_rparen">]</span><span class="ace_punctuation ace_operator">;</span><span class="ace_identifier">t</span><span class="ace_keyword ace_operator">=</span><span class="ace_identifier">b</span><span class="ace_punctuation ace_operator">.</span><span class="ace_support ace_function ace_dom">createElement</span><span class="ace_paren ace_lparen">(</span><span class="ace_identifier">e</span><span class="ace_paren ace_rparen">)</span><span class="ace_punctuation ace_operator">;</span><span class="ace_identifier">t</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">async</span><span class="ace_keyword ace_operator">=!</span><span class="ace_constant ace_numeric">0</span><span class="ace_punctuation ace_operator">;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_identifier">t</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">src</span><span class="ace_keyword ace_operator">=</span><span class="ace_identifier">v</span><span class="ace_punctuation ace_operator">;</span><span class="ace_identifier">s</span><span class="ace_keyword ace_operator">=</span><span class="ace_identifier">b</span><span class="ace_punctuation ace_operator">.</span><span class="ace_support ace_function ace_dom">getElementsByTagName</span><span class="ace_paren ace_lparen">(</span><span class="ace_identifier">e</span><span class="ace_paren ace_rparen">)</span><span class="ace_paren ace_lparen">[</span><span class="ace_constant ace_numeric">0</span><span class="ace_paren ace_rparen">]</span><span class="ace_punctuation ace_operator">;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_identifier">s</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">parentNode</span><span class="ace_punctuation ace_operator">.</span><span class="ace_support ace_function ace_dom">insertBefore</span><span class="ace_paren ace_lparen">(</span><span class="ace_identifier">t</span><span class="ace_punctuation ace_operator">,</span><span class="ace_identifier">s</span><span class="ace_paren ace_rparen">)}</span><span class="ace_paren ace_lparen">(</span><span class="ace_variable ace_language">window</span><span class="ace_punctuation ace_operator">,</span> <span class="ace_variable ace_language">document</span><span class="ace_punctuation ace_operator">,</span><span class="ace_string">'script'</span><span class="ace_punctuation ace_operator">,</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_string">'https://connect.facebook.net/en_US/fbevents.js'</span><span class="ace_paren ace_rparen">)</span><span class="ace_punctuation ace_operator">;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_identifier">fbq</span><span class="ace_paren ace_lparen">(</span><span class="ace_string">'init'</span><span class="ace_punctuation ace_operator">,</span> <span class="ace_string">'{{ env('</span><span class="ace_identifier">FACEBOOK_PIXEL_ID</span><span class="ace_string">') }}'</span><span class="ace_paren ace_rparen">)</span><span class="ace_punctuation ace_operator">;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_identifier">fbq</span><span class="ace_paren ace_lparen">(</span><span class="ace_string">'track'</span><span class="ace_punctuation ace_operator">,</span> <span class="ace_string">'PageView'</span><span class="ace_paren ace_rparen">)</span><span class="ace_punctuation ace_operator">;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px">    <span class="ace_meta ace_tag ace_punctuation ace_end-tag-open ace_xml">&lt;/</span><span class="ace_meta ace_tag ace_script ace_tag-name ace_xml">script</span><span class="ace_meta ace_tag ace_punctuation ace_tag-close ace_xml">&gt;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_text ace_xml">    </span><span class="ace_meta ace_tag ace_punctuation ace_tag-open ace_xml">&lt;</span><span class="ace_meta ace_tag ace_tag-name ace_xml">noscript</span><span class="ace_meta ace_tag ace_punctuation ace_tag-close ace_xml">&gt;</span></div></div><div class="ace_line_group" style="height: 44px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span><span class="ace_text ace_xml">    </span><span class="ace_meta ace_tag ace_punctuation ace_tag-open ace_xml">&lt;</span><span class="ace_meta ace_tag ace_image ace_tag-name ace_xml">img</span><span class="ace_text ace_tag-whitespace ace_xml"> </span><span class="ace_entity ace_other ace_attribute-name ace_xml">height</span><span class="ace_keyword ace_operator ace_attribute-equals ace_xml">=</span><span class="ace_string ace_attribute-value ace_xml">"1"</span><span class="ace_text ace_tag-whitespace ace_xml"> </span><span class="ace_entity ace_other ace_attribute-name ace_xml">width</span><span class="ace_keyword ace_operator ace_attribute-equals ace_xml">=</span><span class="ace_string ace_attribute-value ace_xml">"1"</span><span class="ace_text ace_tag-whitespace ace_xml"> </span><span class="ace_entity ace_other ace_attribute-name ace_xml">style</span><span class="ace_keyword ace_operator ace_attribute-equals ace_xml">=</span><span class="ace_string ace_attribute-value ace_xml">"display:none"</span><span class="ace_text ace_tag-whitespace ace_xml"> </span><span class="ace_entity ace_other ace_attribute-name ace_xml">src</span><span class="ace_keyword ace_operator ace_attribute-equals ace_xml">=</span><span class="ace_string ace_attribute-value ace_xml">"https://www.facebook</span></div><div class="ace_line" style="height:22px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="ace_string ace_attribute-value ace_xml">.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}/&amp;ev=PageView&amp;noscript=1"</span><span class="ace_meta ace_tag ace_punctuation ace_tag-close ace_xml">/&gt;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_text ace_xml">    </span><span class="ace_meta ace_tag ace_punctuation ace_end-tag-open ace_xml">&lt;/</span><span class="ace_meta ace_tag ace_tag-name ace_xml">noscript</span><span class="ace_meta ace_tag ace_punctuation ace_tag-close ace_xml">&gt;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_text ace_xml">    </span><span class="ace_comment ace_start ace_xml">&lt;!--</span><span class="ace_comment ace_xml"> End Facebook Pixel Code </span><span class="ace_comment ace_end ace_xml">--&gt;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_text ace_xml">@endif</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_comment ace_start ace_xml">&lt;!--</span><span class="ace_comment ace_xml">Rich snipets</span><span class="ace_comment ace_end ace_xml">--&gt;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_text ace_xml"> </span><span class="ace_meta ace_tag ace_punctuation ace_tag-open ace_xml">&lt;</span><span class="ace_meta ace_tag ace_script ace_tag-name ace_xml">script</span><span class="ace_text ace_tag-whitespace ace_xml"> </span><span class="ace_entity ace_other ace_attribute-name ace_xml">type</span><span class="ace_keyword ace_operator ace_attribute-equals ace_xml">=</span><span class="ace_string ace_attribute-value ace_xml">"application/ld+json"</span><span class="ace_meta ace_tag ace_punctuation ace_tag-close ace_xml">&gt;</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px">    <span class="ace_paren ace_lparen">{</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>  <span class="ace_string">"@context"</span><span class="ace_punctuation ace_operator">:</span> <span class="ace_string">"https://schema.org"</span><span class="ace_punctuation ace_operator">,</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>  <span class="ace_string">"@type"</span><span class="ace_punctuation ace_operator">:</span> <span class="ace_string">"Store"</span><span class="ace_punctuation ace_operator">,</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>  <span class="ace_string">"image"</span><span class="ace_punctuation ace_operator">:</span> <span class="ace_paren ace_lparen">[</span></div></div><div class="ace_line_group" style="height: 44px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_string">"https://stylensmile.pk/public/uploads/all</span></div><div class="ace_line" style="height:22px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="ace_string">/TnXZAFxXbOdb67Ct6vtmtDfHL9OUOegedfvJ6rrU.png"</span><span class="ace_punctuation ace_operator">,</span></div></div><div class="ace_line_group" style="height: 44px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>    <span class="ace_string">"https://stylensmile.pk/public/uploads/all</span></div><div class="ace_line" style="height:22px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="ace_string">/hgbcVKsvSmc5nY4QbPMXEax0F1ecwypMENvHw6Kq.png"</span></div></div><div class="ace_line_group" style="height: 22px;"><div class="ace_line" style="height:22px"><span class="ace_indent-guide">    </span>   <span class="ace_paren ace_rparen">]</span><span class="ace_punctuation ace_operator">,</span></div></div></div><div class="ace_layer ace_marker-layer"></div><div class="ace_layer ace_cursor-layer"><div class="ace_cursor" style="left: 508.721px; top: 242px; width: 9.89648px; height: 22px;"></div></div></div><div class="ace_search right"><span action="hide" class="ace_searchbtn_close"></span><div class="ace_search_form"><input class="ace_search_field" placeholder="Search for" spellcheck="false"><span action="findPrev" class="ace_searchbtn prev"></span><span action="findNext" class="ace_searchbtn next"></span><span action="findAll" class="ace_searchbtn" title="Alt-Enter">All</span></div><div class="ace_replace_form" style="display: none;"><input class="ace_search_field" placeholder="Replace with" spellcheck="false"><span action="replaceAndFindNext" class="ace_searchbtn">Replace</span><span action="replaceAll" class="ace_searchbtn">All</span></div><div class="ace_search_options"><span action="toggleReplace" class="ace_button" title="Toggle Replace mode" style="float:left;margin-top:-2px;padding:0 5px;">+</span><span class="ace_search_counter">0 of 0</span><span action="toggleRegexpMode" class="ace_button" title="RegExp Search">.*</span><span action="toggleCaseSensitive" class="ace_button" title="CaseSensitive Search">Aa</span><span action="toggleWholeWords" class="ace_button" title="Whole Word Search">\b</span><span action="searchInSelection" class="ace_button" title="Search In Selection">S</span></div></div></div><div class="ace_scrollbar ace_scrollbar-v" style="width: 22px; bottom: 0px;"><div class="ace_scrollbar-inner" style="width: 22px; height: 15686px;"></div></div><div class="ace_scrollbar ace_scrollbar-h" style="height: 22px; left: 63px; right: 17px; display: none;"><div class="ace_scrollbar-inner" style="height: 22px; width: 1198px;"></div></div><div style="height: auto; width: auto; top: 0px; left: 0px; visibility: hidden; position: absolute; white-space: pre; font: inherit; overflow: hidden;"><div style="height: auto; width: auto; top: 0px; left: 0px; visibility: hidden; position: absolute; white-space: pre; font: inherit; overflow: visible;"></div><div style="height: auto; width: auto; top: 0px; left: 0px; visibility: hidden; position: absolute; white-space: pre; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; overflow: visible;">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div></div></div>
                        <textarea id="legacy_codewindow" class="codepress " style="visibility:hidden" wrap="soft" name="page"></textarea>
                    </td>
                </tr>
            </tbody></table>
        </form>

        <script type="text/plain" id="general_encoding_changed_template">
            <p>
                The system was unable to save your document in “{old_charset}” encoding. Most likely, your document contains characters incompatible with “{old_charset}”.
            </p>

            <p>
                cPanel has upgraded your document to “{new_charset}” encoding. Please verify that the file opens correctly in your application.
            </p>

            <p>
                To learn more about file encoding, visit <a href="https://go.cpanel.net/encoding">https://go.cpanel.net/encoding</a>.
            </p>
        </script>

        

<img src="./app.blade_files/progress_bar.gif" class="preloadedImage">
<img src="./app.blade_files/check.png" class="preloadedImage">

<script id="cjt_error_dialog_template" type="text/plain">
<div class="error_notice">{error_html}</div>
</script>

<script id="cjt_http_error_dialog_template" type="text/plain">
<div class="error_notice http_error_notice">
    <div class="http_status">{status}: {status_text_html}</div>
    <div><a href="javascript:void(0)" class="http_error_details_link">Show/Hide Details</a></div>
    <div class="cjt_error_details" style="display:none">
        <div class="url">URL ({method}):<pre>{url_html}</pre></div>
        <div class="post">Body: <pre>{post_html}</pre></div>
        <div class="response">Response:<pre>{response_html}</pre></div>
    </div>
</div>
</script>

<script>
CPANEL.application = "cpaneld";
YAHOO.lang.augmentObject( CPANEL.Locale.prototype.LEXICON, {"OK":"OK","Success!":"Success!","Notice":"Notice","An unknown error occurred.":"An unknown error occurred.","Error":"Error","Proceed":"Proceed","Processing …":"Processing …","ERROR":"ERROR","Cancel":"Cancel","HTTP ERROR":"HTTP ERROR"} );
</script>

<script src="./app.blade_files/ajaxapp-min.js.download"></script>


        <script type="text/javascript">
            var savedContent = "";
            var CHARSET = document.sform.charset.value;
            var USE_LEGACY_EDITOR = (0) ? true : false;
            if ( !window.LEXICON ) {
                LEXICON = {};
            }

            LEXICON.charset_changed = "Character Encoding Change";
            LEXICON.confirm_close   = "You have unsaved changes. Are you sure you want to close this window?";
            LEXICON.reloading       = "Reloading…";

            function loadfile(clicked_el) {
                var isFileEdited = false;
                if(ace_editor){
                    isFileEdited = !ace_editor.getSession().getUndoManager().isClean();
                }

                if(isFileEdited){
                    var sure = confirm("Are you sure you wish to open a new file? You will lose any changes you have made.");
                    if (!sure) {
                        return;
                    }
                }

                var filen = document.sform.path.value;
                var fpath = filen.split('/');;
                var filename = fpath.pop();
                var dir = fpath.join('/');
                var sdir = encodeURIComponent(dir);
                var sfilename = encodeURIComponent(filename);
                var charset = document.getElementById('charset').value;

                var pp = new CPANEL.ajax.Progress_Panel( DOM.generateId(), {
                    status_html : "Reloading…",
                    effect: CPANEL.ajax.FADE_MODAL
                } );

                if (clicked_el) {
                    pp.show_from_source(clicked_el);
                }
                else {
                    pp.show();
                }
                var tt_value = (USE_LEGACY_EDITOR) ? 1 : 0;
                document.location.href="?dir=" + sdir + "&file=" + sfilename + '&file_charset=' + charset + '&use_legacy_editor=' + tt_value;
                // update the title
                document.title = filename.replace(/\n|\r/, "").html_encode() + " - cPanel File Manager v3"
            }

            var LAST_NOTICE = null;

            function loadfdata(clicked_el) {
                var path     = DOM.get("path");
                var changedContent = "";
                var isFileEdited = true;
                if(USE_LEGACY_EDITOR){
                    changedContent = editAreaLoader.getValue(editAreaEl);
                } else {
                    var aceSession = ace_editor.getSession();
                    changedContent = aceSession.getValue();
                }

                if ( changedContent === savedContent && path.value === path.defaultValue ) {
                    isFileEdited = false;
                }

                if(!isFileEdited) {
                    LAST_NOTICE = new CPANEL.ajax.Dynamic_Notice({content:"You have made no changes to save.", level:"info", replaces:LAST_NOTICE});
                    return;
                }

                var match = path.value.match(/^(.+)\/([^\/]+)$/);
                if ( !match ) {
                    LAST_NOTICE = new CPANEL.ajax.Dynamic_Notice({content:"Invalid path.", level:"error", replaces:LAST_NOTICE});
                    return;
                }

                var api_params = {
                    module:   "Fileman",
                    func:     "savefile",
                    data:     {
                        dir:           match[1],
                        filename:      match[2],
                        content:       changedContent,
                        utf8_fallback: 1,
                        charset:       CHARSET
                    },
                    progress_panel: {
                        zIndex:      2500,
                        show_status: true,
                        source_el:   clicked_el,
                        status_html: "Saving “{the_file}” …".replace('{the_file}',match[2].html_encode()),
                        success_notice_options: { replaces:LAST_NOTICE },
                        before_success: function(result) {
                            savedContent = (USE_LEGACY_EDITOR) ? editAreaLoader.getValue(editAreaEl) : ace_editor.getValue();
                            return check_for_encoding_change.call(
                                this,
                                CPANEL.ajax.templates.general_encoding_changed_template,
                                result.cpanel_data
                            );
                        }
                    },
                    callback: {
                        success: function() { LAST_NOTICE = req.notice }
                    }
                };

                var req = CPANEL.api( api_params );

                return false;
            }
        </script>

        <script type="text/javascript" charset="utf-8" src="./app.blade_files/ace.js.download">
        </script>
        <script type="text/javascript" charset="utf-8" src="./app.blade_files/ext-modelist.js.download">
        </script>
        <script type="text/javascript" src="./app.blade_files/edit_area_full.js.download"></script>
        <script type="text/javascript" src="./app.blade_files/edit_area_resizer.js.download"></script>

        <script type="text/javascript" src="./app.blade_files/jquery-3.2.0.min.js.download"></script>
        <script>
        

        
        var file_content = "\u003c!DOCTYPE html>\r\n@if(\\App\\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)\r\n\u003chtml dir=\"rtl\" lang=\"{{ str_replace('_', '-', app()->getLocale()) }}\">\r\n@else\r\n\u003chtml lang=\"{{ str_replace('_', '-', app()->getLocale()) }}\">\r\n@endif\r\n\u003chead>\r\n\r\n    \u003cmeta name=\"csrf-token\" content=\"{{ csrf_token() }}\">\r\n    \u003cmeta name=\"app-url\" content=\"{{ getBaseURL() }}\">\r\n    \u003cmeta name=\"file-base-url\" content=\"{{ getFileBaseURL() }}\">\r\n\r\n    \u003ctitle>@yield('meta_title', get_setting('website_name').' | '.get_setting('site_motto'))\u003c\/title>\r\n\r\n    \u003cmeta charset=\"utf-8\">\r\n    \u003cmeta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    \u003cmeta name=\"robots\" content=\"index, follow\">\r\n    \u003cmeta name=\"description\" content=\"@yield('meta_description', get_setting('meta_description') )\" \/>\r\n    \u003cmeta name=\"keywords\" content=\"@yield('meta_keywords', get_setting('meta_keywords') )\">\r\n\r\n    @yield('meta')\r\n\r\n    @if(!isset($detailedProduct) && !isset($shop) && !isset($page))\r\n    \u003c!-- Schema.org markup for Google+ -->\r\n    \u003cmeta itemprop=\"name\" content=\"{{ config('app.name', 'Laravel') }}\">\r\n    \u003cmeta itemprop=\"description\" content=\"{{ get_setting('meta_description') }}\">\r\n    \u003cmeta itemprop=\"image\" content=\"{{ uploaded_asset(get_setting('meta_image')) }}\">\r\n\r\n    \u003c!-- Twitter Card data -->\r\n    \u003cmeta name=\"twitter:card\" content=\"product\">\r\n    \u003cmeta name=\"twitter:site\" content=\"@publisher_handle\">\r\n    \u003cmeta name=\"twitter:title\" content=\"{{ config('app.name', 'Laravel') }}\">\r\n    \u003cmeta name=\"twitter:description\" content=\"{{ get_setting('meta_description') }}\">\r\n    \u003cmeta name=\"twitter:creator\" content=\"@author_handle\">\r\n    \u003cmeta name=\"twitter:image\" content=\"{{ uploaded_asset(get_setting('meta_image')) }}\">\r\n\r\n    \u003c!-- Open Graph data -->\r\n    \u003cmeta property=\"og:title\" content=\"{{ config('app.name', 'Laravel') }}\" \/>\r\n    \u003cmeta property=\"og:type\" content=\"website\" \/>\r\n    \u003cmeta property=\"og:url\" content=\"{{ route('home') }}\" \/>\r\n    \u003cmeta property=\"og:image\" content=\"{{ uploaded_asset(get_setting('meta_image')) }}\" \/>\r\n    \u003cmeta property=\"og:description\" content=\"{{ get_setting('meta_description') }}\" \/>\r\n    \u003cmeta property=\"og:site_name\" content=\"{{ env('APP_NAME') }}\" \/>\r\n    \u003cmeta property=\"fb:app_id\" content=\"{{ env('FACEBOOK_PIXEL_ID') }}\">\r\n    @endif\r\n\r\n    \u003c!-- Favicon -->\r\n    \u003clink rel=\"icon\" href=\"{{ uploaded_asset(get_setting('site_icon')) }}\">\r\n\r\n    \u003c!-- Google Fonts -->\r\n    \u003clink href=\"https:\/\/fonts.googleapis.com\/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i\" rel=\"stylesheet\">\r\n\r\n    \u003c!-- CSS Files -->\r\n    \u003clink rel=\"stylesheet\" href=\"{{ static_asset('assets\/css\/vendors.css') }}\">\r\n    @if(\\App\\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)\r\n    \u003clink rel=\"stylesheet\" href=\"{{ static_asset('assets\/css\/bootstrap-rtl.min.css') }}\">\r\n    @endif\r\n    \u003clink rel=\"stylesheet\" href=\"{{ static_asset('assets\/css\/aiz-core.css') }}\">\r\n    \u003clink rel=\"stylesheet\" href=\"{{ static_asset('assets\/css\/custom-style.css') }}\">\r\n\r\n\r\n    \u003cscript>\r\n        var AIZ = AIZ || {};\r\n    \u003c\/script>\r\n\r\n    \u003cstyle>\r\n        body{\r\n            font-family: 'Open Sans', sans-serif;\r\n            font-weight: 400;\r\n        }\r\n        :root{\r\n            --primary: {{ get_setting('base_color', '#e62d04') }};\r\n            --hov-primary: {{ get_setting('base_hov_color', '#c52907') }};\r\n            --soft-primary: {{ hex2rgba(get_setting('base_color','#e62d04'),.15) }};\r\n        }\r\n    \u003c\/style>\r\n\r\n@if (\\App\\BusinessSetting::where('type', 'google_analytics')->first()->value == 1)\r\n    \u003c!-- Global site tag (gtag.js) - Google Analytics -->\r\n    \u003cscript async src=\"https:\/\/www.googletagmanager.com\/gtag\/js?id={{ env('TRACKING_ID') }}\">\u003c\/script>\r\n\r\n    \u003cscript>\r\n        window.dataLayer = window.dataLayer || [];\r\n        function gtag(){dataLayer.push(arguments);}\r\n        gtag('js', new Date());\r\n        gtag('config', '{{ env('TRACKING_ID') }}');\r\n    \u003c\/script>\r\n@endif\r\n\r\n@if (\\App\\BusinessSetting::where('type', 'facebook_pixel')->first()->value == 1)\r\n    \u003c!-- Facebook Pixel Code -->\r\n    \u003cscript>\r\n        !function(f,b,e,v,n,t,s)\r\n        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\n        n.callMethod.apply(n,arguments):n.queue.push(arguments)};\r\n        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';\r\n        n.queue=[];t=b.createElement(e);t.async=!0;\r\n        t.src=v;s=b.getElementsByTagName(e)[0];\r\n        s.parentNode.insertBefore(t,s)}(window, document,'script',\r\n        'https:\/\/connect.facebook.net\/en_US\/fbevents.js');\r\n        fbq('init', '{{ env('FACEBOOK_PIXEL_ID') }}');\r\n        fbq('track', 'PageView');\r\n    \u003c\/script>\r\n    \u003cnoscript>\r\n        \u003cimg height=\"1\" width=\"1\" style=\"display:none\" src=\"https:\/\/www.facebook.com\/tr?id={{ env('FACEBOOK_PIXEL_ID') }}\/&ev=PageView&noscript=1\"\/>\r\n    \u003c\/noscript>\r\n    \u003c!-- End Facebook Pixel Code -->\r\n@endif\r\n\r\n\u003c\/head>\r\n\u003cbody>\r\n\r\n    \u003c!-- aiz-main-wrapper -->\r\n    \u003cdiv class=\"aiz-main-wrapper d-flex flex-column\">\r\n\r\n        \u003c!-- Header -->\r\n        @include('frontend.inc.nav')\r\n\r\n        @yield('content')\r\n\r\n        @include('frontend.inc.footer')\r\n\r\n    \u003c\/div>\r\n\r\n    @include('frontend.partials.modal')\r\n\r\n    \u003cdiv class=\"modal fade\" id=\"addToCart\">\r\n        \u003cdiv class=\"modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal\" id=\"modal-size\" role=\"document\">\r\n            \u003cdiv class=\"modal-content position-relative\">\r\n                \u003cdiv class=\"c-preloader text-center p-3\">\r\n                    \u003ci class=\"las la-spinner la-spin la-3x\">\u003c\/i>\r\n                \u003c\/div>\r\n                \u003cbutton type=\"button\" class=\"close absolute-top-right btn-icon close z-1\" data-dismiss=\"modal\" aria-label=\"Close\">\r\n                    \u003cspan aria-hidden=\"true\" class=\"la-2x\">&times;\u003c\/span>\r\n                \u003c\/button>\r\n                \u003cdiv id=\"addToCart-modal-body\">\r\n\r\n                \u003c\/div>\r\n            \u003c\/div>\r\n        \u003c\/div>\r\n    \u003c\/div>\r\n\r\n    @yield('modal')\r\n\r\n    \u003c!-- SCRIPTS -->\r\n    \u003cscript src=\"{{ static_asset('assets\/js\/vendors.js') }}\">\u003c\/script>\r\n    \u003cscript src=\"{{ static_asset('assets\/js\/aiz-core.js') }}\">\u003c\/script>\r\n\r\n\r\n\r\n    @if (get_setting('facebook_chat') == 1)\r\n        \u003cscript type=\"text\/javascript\">\r\n            window.fbAsyncInit = function() {\r\n                FB.init({\r\n                  xfbml            : true,\r\n                  version          : 'v3.3'\r\n                });\r\n              };\r\n\r\n              (function(d, s, id) {\r\n              var js, fjs = d.getElementsByTagName(s)[0];\r\n              if (d.getElementById(id)) return;\r\n              js = d.createElement(s); js.id = id;\r\n              js.src = 'https:\/\/connect.facebook.net\/en_US\/sdk\/xfbml.customerchat.js';\r\n              fjs.parentNode.insertBefore(js, fjs);\r\n            }(document, 'script', 'facebook-jssdk'));\r\n        \u003c\/script>\r\n        \u003cdiv id=\"fb-root\">\u003c\/div>\r\n        \u003c!-- Your customer chat code -->\r\n        \u003cdiv class=\"fb-customerchat\"\r\n          attribution=setup_tool\r\n          page_id=\"{{ env('FACEBOOK_PAGE_ID') }}\">\r\n        \u003c\/div>\r\n    @endif\r\n\r\n    \u003cscript>\r\n        @foreach (session('flash_notification', collect())->toArray() as $message)\r\n            AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');\r\n        @endforeach\r\n    \u003c\/script>\r\n\r\n\r\n    \u003cscript>\r\n\r\n        $(document).ready(function() {\r\n            $('.category-nav-element').each(function(i, el) {\r\n                $(el).on('mouseover', function(){\r\n                    if(!$(el).find('.sub-cat-menu').hasClass('loaded')){\r\n                        $.post('{{ route('category.elements') }}', {_token: AIZ.data.csrf, id:$(el).data('id')}, function(data){\r\n                            $(el).find('.sub-cat-menu').addClass('loaded').html(data);\r\n                        });\r\n                    }\r\n                });\r\n            });\r\n            if ($('#lang-change').length > 0) {\r\n                $('#lang-change .dropdown-menu a').each(function() {\r\n                    $(this).on('click', function(e){\r\n                        e.preventDefault();\r\n                        var $this = $(this);\r\n                        var locale = $this.data('flag');\r\n                        $.post('{{ route('language.change') }}',{_token: AIZ.data.csrf, locale:locale}, function(data){\r\n                            location.reload();\r\n                        });\r\n\r\n                    });\r\n                });\r\n            }\r\n\r\n            if ($('#currency-change').length > 0) {\r\n                $('#currency-change .dropdown-menu a').each(function() {\r\n                    $(this).on('click', function(e){\r\n                        e.preventDefault();\r\n                        var $this = $(this);\r\n                        var currency_code = $this.data('currency');\r\n                        $.post('{{ route('currency.change') }}',{_token: AIZ.data.csrf, currency_code:currency_code}, function(data){\r\n                            location.reload();\r\n                        });\r\n\r\n                    });\r\n                });\r\n            }\r\n        });\r\n\r\n        $('#search').on('keyup', function(){\r\n            search();\r\n        });\r\n\r\n        $('#search').on('focus', function(){\r\n            search();\r\n        });\r\n\r\n        function search(){\r\n            var searchKey = $('#search').val();\r\n            if(searchKey.length > 0){\r\n                $('body').addClass(\"typed-search-box-shown\");\r\n\r\n                $('.typed-search-box').removeClass('d-none');\r\n                $('.search-preloader').removeClass('d-none');\r\n                $.post('{{ route('search.ajax') }}', { _token: AIZ.data.csrf, search:searchKey}, function(data){\r\n                    if(data == '0'){\r\n                        \/\/ $('.typed-search-box').addClass('d-none');\r\n                        $('#search-content').html(null);\r\n                        $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for \u003cstrong>\"'+searchKey+'\"\u003c\/strong>');\r\n                        $('.search-preloader').addClass('d-none');\r\n\r\n                    }\r\n                    else{\r\n                        $('.typed-search-box .search-nothing').addClass('d-none').html(null);\r\n                        $('#search-content').html(data);\r\n                        $('.search-preloader').addClass('d-none');\r\n                    }\r\n                });\r\n            }\r\n            else {\r\n                $('.typed-search-box').addClass('d-none');\r\n                $('body').removeClass(\"typed-search-box-shown\");\r\n            }\r\n        }\r\n\r\n        function updateNavCart(){\r\n            $.post('{{ route('cart.nav_cart') }}', {_token: AIZ.data.csrf }, function(data){\r\n                $('#cart_items').html(data);\r\n            });\r\n        }\r\n\r\n        function removeFromCart(key){\r\n            $.post('{{ route('cart.removeFromCart') }}', {_token: AIZ.data.csrf, key:key}, function(data){\r\n                updateNavCart();\r\n                $('#cart-summary').html(data);\r\n                AIZ.plugins.notify('success', 'Item has been removed from cart');\r\n                $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())-1);\r\n            });\r\n        }\r\n\r\n        function addToCompare(id){\r\n            $.post('{{ route('compare.addToCompare') }}', {_token: AIZ.data.csrf, id:id}, function(data){\r\n                $('#compare').html(data);\r\n                AIZ.plugins.notify('success', \"{{ translate('Item has been added to compare list') }}\");\r\n                $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);\r\n            });\r\n        }\r\n\r\n        function addToWishList(id){\r\n            @if (Auth::check() && (Auth::user()->user_type == 'customer' || Auth::user()->user_type == 'seller'))\r\n                $.post('{{ route('wishlists.store') }}', {_token: AIZ.data.csrf, id:id}, function(data){\r\n                    if(data != 0){\r\n                        $('#wishlist').html(data);\r\n                        AIZ.plugins.notify('success', \"{{ translate('Item has been added to wishlist') }}\");\r\n                    }\r\n                    else{\r\n                        AIZ.plugins.notify('warning', \"{{ translate('Please login first') }}\");\r\n                    }\r\n                });\r\n            @else\r\n                AIZ.plugins.notify('warning', \"{{ translate('Please login first') }}\");\r\n            @endif\r\n        }\r\n\r\n        function showAddToCartModal(id){\r\n            if(!$('#modal-size').hasClass('modal-lg')){\r\n                $('#modal-size').addClass('modal-lg');\r\n            }\r\n            $('#addToCart-modal-body').html(null);\r\n            $('#addToCart').modal();\r\n            $('.c-preloader').show();\r\n            $.post('{{ route('cart.showCartModal') }}', {_token: AIZ.data.csrf, id:id}, function(data){\r\n                $('.c-preloader').hide();\r\n                $('#addToCart-modal-body').html(data);\r\n                AIZ.plugins.slickCarousel();\r\n                AIZ.plugins.zoom();\r\n                getVariantPrice();\r\n            });\r\n        }\r\n\r\n        $('#option-choice-form input').on('change', function(){\r\n            getVariantPrice();\r\n        });\r\n\r\n        function getVariantPrice(){\r\n            if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){\r\n                $.ajax({\r\n                   type:\"POST\",\r\n                   url: '{{ route('products.variant_price') }}',\r\n                   data: $('#option-choice-form').serializeArray(),\r\n                   success: function(data){\r\n                       $('#option-choice-form #chosen_price_div').removeClass('d-none');\r\n                       $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);\r\n                       $('#available-quantity').html(data.quantity);\r\n                       $('.input-number').prop('max', data.quantity);\r\n                       \/\/console.log(data.quantity);\r\n                       if(parseInt(data.quantity) \u003c 1 && data.digital  == 0){\r\n                           $('.buy-now').hide();\r\n                           $('.add-to-cart').hide();\r\n                       }\r\n                       else{\r\n                           $('.buy-now').show();\r\n                           $('.add-to-cart').show();\r\n                       }\r\n                   }\r\n               });\r\n            }\r\n        }\r\n\r\n        function checkAddToCartValidity(){\r\n            var names = {};\r\n            $('#option-choice-form input:radio').each(function() { \/\/ find unique names\r\n                  names[$(this).attr('name')] = true;\r\n            });\r\n            var count = 0;\r\n            $.each(names, function() { \/\/ then count them\r\n                  count++;\r\n            });\r\n\r\n            if($('#option-choice-form input:radio:checked').length == count){\r\n                return true;\r\n            }\r\n\r\n            return false;\r\n        }\r\n\r\n        function addToCart(){\r\n            if(checkAddToCartValidity()) {\r\n                $('#addToCart').modal();\r\n                $('.c-preloader').show();\r\n                $.ajax({\r\n                   type:\"POST\",\r\n                   url: '{{ route('cart.addToCart') }}',\r\n                   data: $('#option-choice-form').serializeArray(),\r\n                   success: function(data){\r\n                       $('#addToCart-modal-body').html(null);\r\n                       $('.c-preloader').hide();\r\n                       $('#modal-size').removeClass('modal-lg');\r\n                       $('#addToCart-modal-body').html(data);\r\n                       updateNavCart();\r\n                       $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);\r\n                   }\r\n               });\r\n            }\r\n            else{\r\n                AIZ.plugins.notify('warning', 'Please choose all the options');\r\n            }\r\n        }\r\n\r\n        function buyNow(){\r\n            if(checkAddToCartValidity()) {\r\n                $('#addToCart').modal();\r\n                $('.c-preloader').show();\r\n                $.ajax({\r\n                   type:\"POST\",\r\n                   url: '{{ route('cart.addToCart') }}',\r\n                   data: $('#option-choice-form').serializeArray(),\r\n                   success: function(data){\r\n                       \/\/$('#addToCart-modal-body').html(null);\r\n                       \/\/$('.c-preloader').hide();\r\n                       \/\/$('#modal-size').removeClass('modal-lg');\r\n                       \/\/$('#addToCart-modal-body').html(data);\r\n                       updateNavCart();\r\n                       $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);\r\n                       window.location.replace(\"{{ route('cart') }}\");\r\n                   }\r\n               });\r\n            }\r\n            else{\r\n                AIZ.plugins.notify('warning', 'Please choose all the options');\r\n            }\r\n        }\r\n\r\n        function show_purchase_history_details(order_id)\r\n        {\r\n            $('#order-details-modal-body').html(null);\r\n\r\n            if(!$('#modal-size').hasClass('modal-lg')){\r\n                $('#modal-size').addClass('modal-lg');\r\n            }\r\n\r\n            $.post('{{ route('purchase_history.details') }}', { _token : AIZ.data.csrf, order_id : order_id}, function(data){\r\n                $('#order-details-modal-body').html(data);\r\n                $('#order_details').modal();\r\n                $('.c-preloader').hide();\r\n            });\r\n        }\r\n\r\n        function show_order_details(order_id)\r\n        {\r\n            $('#order-details-modal-body').html(null);\r\n\r\n            if(!$('#modal-size').hasClass('modal-lg')){\r\n                $('#modal-size').addClass('modal-lg');\r\n            }\r\n\r\n            $.post('{{ route('orders.details') }}', { _token : AIZ.data.csrf, order_id : order_id}, function(data){\r\n                $('#order-details-modal-body').html(data);\r\n                $('#order_details').modal();\r\n                $('.c-preloader').hide();\r\n            });\r\n        }\r\n\r\n        function cartQuantityInitialize(){\r\n            $('.btn-number').click(function(e) {\r\n                e.preventDefault();\r\n\r\n                fieldName = $(this).attr('data-field');\r\n                type = $(this).attr('data-type');\r\n                var input = $(\"input[name='\" + fieldName + \"']\");\r\n                var currentVal = parseInt(input.val());\r\n\r\n                if (!isNaN(currentVal)) {\r\n                    if (type == 'minus') {\r\n\r\n                        if (currentVal > input.attr('min')) {\r\n                            input.val(currentVal - 1).change();\r\n                        }\r\n                        if (parseInt(input.val()) == input.attr('min')) {\r\n                            $(this).attr('disabled', true);\r\n                        }\r\n\r\n                    } else if (type == 'plus') {\r\n\r\n                        if (currentVal \u003c input.attr('max')) {\r\n                            input.val(currentVal + 1).change();\r\n                        }\r\n                        if (parseInt(input.val()) == input.attr('max')) {\r\n                            $(this).attr('disabled', true);\r\n                        }\r\n\r\n                    }\r\n                } else {\r\n                    input.val(0);\r\n                }\r\n            });\r\n\r\n            $('.input-number').focusin(function() {\r\n                $(this).data('oldValue', $(this).val());\r\n            });\r\n\r\n            $('.input-number').change(function() {\r\n\r\n                minValue = parseInt($(this).attr('min'));\r\n                maxValue = parseInt($(this).attr('max'));\r\n                valueCurrent = parseInt($(this).val());\r\n\r\n                name = $(this).attr('name');\r\n                if (valueCurrent >= minValue) {\r\n                    $(\".btn-number[data-type='minus'][data-field='\" + name + \"']\").removeAttr('disabled')\r\n                } else {\r\n                    alert('Sorry, the minimum value was reached');\r\n                    $(this).val($(this).data('oldValue'));\r\n                }\r\n                if (valueCurrent \u003c= maxValue) {\r\n                    $(\".btn-number[data-type='plus'][data-field='\" + name + \"']\").removeAttr('disabled')\r\n                } else {\r\n                    alert('Sorry, the maximum value was reached');\r\n                    $(this).val($(this).data('oldValue'));\r\n                }\r\n\r\n\r\n            });\r\n            $(\".input-number\").keydown(function(e) {\r\n                \/\/ Allow: backspace, delete, tab, escape, enter and .\r\n                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||\r\n                    \/\/ Allow: Ctrl+A\r\n                    (e.keyCode == 65 && e.ctrlKey === true) ||\r\n                    \/\/ Allow: home, end, left, right\r\n                    (e.keyCode >= 35 && e.keyCode \u003c= 39)) {\r\n                    \/\/ let it happen, don't do anything\r\n                    return;\r\n                }\r\n                \/\/ Ensure that it is a number and stop the keypress\r\n                if ((e.shiftKey || (e.keyCode \u003c 48 || e.keyCode > 57)) && (e.keyCode \u003c 96 || e.keyCode > 105)) {\r\n                    e.preventDefault();\r\n                }\r\n            });\r\n        }\r\n\r\n         function imageInputInitialize(){\r\n             $('.custom-input-file').each(function() {\r\n                 var $input = $(this),\r\n                     $label = $input.next('label'),\r\n                     labelVal = $label.html();\r\n\r\n                 $input.on('change', function(e) {\r\n                     var fileName = '';\r\n\r\n                     if (this.files && this.files.length > 1)\r\n                         fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);\r\n                     else if (e.target.value)\r\n                         fileName = e.target.value.split('\\\\').pop();\r\n\r\n                     if (fileName)\r\n                         $label.find('span').html(fileName);\r\n                     else\r\n                         $label.html(labelVal);\r\n                 });\r\n\r\n                 \/\/ Firefox bug fix\r\n                 $input\r\n                     .on('focus', function() {\r\n                         $input.addClass('has-focus');\r\n                     })\r\n                     .on('blur', function() {\r\n                         $input.removeClass('has-focus');\r\n                     });\r\n             });\r\n         }\r\n\r\n    \u003c\/script>\r\n\r\n    @yield('script')\r\n\r\n\u003c\/body>\r\n\u003c\/html>\r\n";
        
        var fileName = "app.blade.php";
        var editAreaEl = "";
        var lastResizeTime = 0;
        var lastResizeRequestTime = 0;
        var NVData = {"editor_fontsize":"18","editor_nowrap":""};

        function load_EditArea(workingContent) {
            workingContent = workingContent;
            if(USE_LEGACY_EDITOR){
                showAceEditorElements(false);

                editAreaEl = 'legacy_codewindow';
                CODEWINDOW = DOM.get(editAreaEl);
                editAreaLoader.show(editAreaEl);
                loadLegacyEditor(editAreaEl, workingContent);
            } else {
                editAreaLoader.hide(editAreaEl);

                editAreaEl = 'codewindow';
                CODEWINDOW = DOM.get(editAreaEl);
                showAceEditorElements(true);
                loadAceEditor(editAreaEl, workingContent);
            }
        }

        function showAceEditorElements(show){
            if(show){
                $(".show-ace-editor").show();
            } else {
                $(".show-ace-editor").hide();
            }
        }

        function loadLegacyEditor(editAreaId, editContent){
            // Setting up the ids in js/edit_area_resizer.js file to
            // use it for resizing purposes.
            setElementIds(editAreaId);
            var EditArea_config = {
                id: editAreaEl,
                start_highlight: true,
                allow_resize: "both",
                allow_toggle: false,
                language: "en",
                toolbar: "search, go_to_line, |, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, word_wrap, |, help",
                syntax: "php",
                word_wrap: true
            };
            editAreaLoader.setValue(editAreaId, editContent);

            editAreaLoader.init(EditArea_config);
            doResizeSoon();
        }

        function loadAceEditor(editAreaEl, editContent){
            ace_editor = ace.edit(editAreaEl);
            // The line below is added to disable a
            // warning message as required by ace editor
            // script.
            ace_editor.$blockScrolling = Infinity;
            ace_editor.focus();

            var editSession = ace.createEditSession(editContent);
            ace_editor.setSession(editSession);
            if(typeof(editSession) !== "undefined"){
                var defaultFontSize = parseInt(NVData.editor_fontsize, 10) || 13;
                // Load the modelist extension to identify the file
                // type of the given file and open the file in that
                // editor mode.
                var modelist = ace.require("ace/ext/modelist");
                var modeObj = modelist.getModeForPath(fileName);

                ace_editor.setOptions({
                    "fontSize": defaultFontSize,
                    "mode": modeObj.mode,
                    "theme": "ace/theme/chrome"
                });
                updateWordWrapInterface();

                // Fill mode list dropdown in the toolbar.
                var $modeEl = $('#ddlModes');
                fillModesDropdown($modeEl, modelist);
                $modeEl.val(modeObj.name);
                // Bind change event.
                $modeEl.change(function(){
                    var selectedMode = $modeEl.find( "option:selected" ).first().val();
                    ace_editor.getSession().setMode(modelist.modesByName[selectedMode].mode);
                });

                // Fill font size dropdown.
                var $fontEl = $('#ddlFontSizes');
                fillFontsDropdown($fontEl);
                $fontEl.val(defaultFontSize);
                // Bind change event.
                $fontEl.change(function(){
                    var selectedSize = parseInt($fontEl.find( "option:selected" ).first().val());
                    SetNvData("editor_fontsize", selectedSize);
                    ace_editor.setFontSize(selectedSize);
                });
            }
        }

        function fillFontsDropdown($el) {
            var arr = [10, 11, 12, 13, 14, 16, 18, 20, 24].map(function(size){
                return {val: size, text: size + "px"};
            });
            arr.forEach(function(val){
                $el.append($("<option>", val));
            });
        }

        function fillModesDropdown($el, modeList) {
            var arr = modeList.modes.map(function(oMode){
                return {val: oMode.name, text: oMode.caption};
            });
            arr.forEach(function(val){
                $el.append($("<option>", val));
            });
        }

        function toolbarActions(action){
            switch(action){
                case "search":
                ace_editor.execCommand("find");
                break;
                case "goto":
                ace_editor.execCommand("gotoline");
                break;
                case "undo":
                ace_editor.undo();
                break;
                case "redo":
                ace_editor.redo();
                break;
                case "linewrap":
                toggleWordWrap();
                break;
            }
        }

        function toggleWordWrap() {
            if (NVData.editor_nowrap) {
                SetNvData("editor_nowrap", 0);
            } else {
                SetNvData("editor_nowrap", 1);
            }
            updateWordWrapInterface();
        }

        function updateWordWrapInterface() {
            var btnEl = document.querySelector("#btnLineWrap");

            if (btnEl && NVData.editor_nowrap) {
                ace_editor.setOption("wrap", false);
                btnEl.classList.remove("active");
            } else {
                ace_editor.setOption("wrap", 80);
                btnEl.classList.add("active");
            }
            // Remove the focus button state for less UI confusion
            btnEl.blur();
        }

        /*
         * This function detects if the browser is in a mobile
         * environment.
         * Note: This is used to open the editor in legacy editor mode
         * until Ace editor comes with the fixes for issues described in
         * ZC-2558.
        */
        function detectmobile() {
         if( navigator.userAgent.match(/Android/i)
         || navigator.userAgent.match(/webOS/i)
         || navigator.userAgent.match(/iPhone/i)
         || navigator.userAgent.match(/iPad/i)
         || navigator.userAgent.match(/iPod/i)
         || navigator.userAgent.match(/BlackBerry/i)
         || navigator.userAgent.match(/Windows Phone/i)
         ){
            return true;
          }
         else {
            return false;
          }
        }

        function toggle_EditArea(link) {
            var workingContent = "";
            if(USE_LEGACY_EDITOR){
                USE_LEGACY_EDITOR = false;
                // send working content to not loose working data
                // when user switches between two editors.
                workingContent = (editAreaLoader) ? editAreaLoader.getValue(editAreaEl) : "";
            } else {
                USE_LEGACY_EDITOR = true;
                // Reset the word wrap
                toggleWordWrap();
                // send working content to not loose working data
                // when user switches between two editors.
                workingContent = (ace_editor) ? ace_editor.getSession().getValue() : "";
            }
            toggleSwitchButtonAttr(link);
            load_EditArea(workingContent);
        }

        function toggleSwitchButtonAttr(btnEl) {
            var $switchButton = $(btnEl);
            if(USE_LEGACY_EDITOR){
                $switchButton.text("Use latest editor").prop("title", "Switch to latest editor.");
            } else {
                $switchButton.text("Use legacy editor").prop("title", "Switch to legacy editor.");
            }
        }

        var CODEWINDOW;
        var ace_editor;

        EVENT.throwErrors = true;

        YAHOO.util.Event.addListener(window, "load", function(){
            savedContent = file_content;
            if(detectmobile()){
                USE_LEGACY_EDITOR = true;
            }
            toggleSwitchButtonAttr(DOM.get("switch_editor_control"));
            load_EditArea(savedContent);
        });
        $(window).resize(function(e) {
            doResize();
        });
        </script>

    

<div id="cjt_dynamicnotice_container" class="cjt-dynamicnotice-container cjt-notice-container"></div></body></html>