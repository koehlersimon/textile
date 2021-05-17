document.addEventListener("DOMContentLoaded", function() {

    var textareas = document.querySelectorAll('textarea');
    var bodytextfield = findBodytextField();

    function findBodytextField(){
        for (var i = 0; i < textareas.length; i++) {
            if(textareas[i].name === 'data[tt_content][10][bodytext]'){
                loadMarkupPreview(textareas[i].value);
                return textareas[i];
                break;
            }
        }
    }

    function buildQueryString(data){
        var dataKeys = Object.keys(data);
        var queryString = "";
        for (var i = 0; i < dataKeys.length; ++i){
            queryString += "&" + dataKeys[i] + "=" + encodeURIComponent(data[dataKeys[i]]);
        }
        return queryString.substr(1);
    }

    function loadMarkupPreview(content){
        var data = {bodytext: content};
        var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');
        let url = TYPO3.settings.ajaxUrls['previewMarkup'];
        let request = new XMLHttpRequest();
        let container = document.getElementById('markup-preview');
        request.open("POST", url, true);
        request.onreadystatechange = function() {
            if (request.readyState === 4 && request.status == "200") {
                container.innerHTML = request.responseText;
            }
            else{
                container.innerHTML = '<div class="alert alert-warning">Preview could not be loaded!</div>';
            }
        }
        request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(params);
    }

    document.addEventListener('change',function(e){
        if(e.target.tagName === 'TEXTAREA'){
            loadMarkupPreview(e.target.value);
            e.preventDefault();
        }
    });

});
