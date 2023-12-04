function getSelectedText() {
    var text = '';
    if (window.getSelection) {
        text = window.getSelection().toString();
    } else if (document.selection && document.selection.type !== 'Control') {
        text = document.selection.createRange().text;
    }
    return text;
}

function toggleHighlight() {
    var selectedText = getSelectedText();
    
    if (selectedText) {
        var content = document.getElementById('top');
        var html = content.innerHTML;

        // Check if the selected text is already highlighted
        var isHighlighted = html.includes(`<span class="highlighted">${selectedText}</span>`);

        if (isHighlighted) {
            // Remove the highlight
            var unhighlightedHtml = html.replace(new RegExp(`<span class="highlighted">${selectedText}</span>`, 'g'), selectedText);
            content.innerHTML = unhighlightedHtml;
        } else {
            // Highlight the text
            var highlightedHtml = html.replace(new RegExp(selectedText, 'g'), `<span class="highlighted">${selectedText}</span>`);
            content.innerHTML = highlightedHtml;
        }
    }
}
