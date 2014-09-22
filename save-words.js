// To be used on
// https://www.englishclub.com/vocabulary/common-words-5000.htm

var holder = document.querySelector('.tableLRT10 tbody tr td ol');
var elements = holder.getElementsByTagName('li');

var words = '';

for(var i = 0, len = elements.length; i < len; ++i) {
	var word = elements[i].textContent;

	if(word.length > 3 && /^[a-z0-9]+$/i.test(word)) {
		words += word.toLowerCase() + "\n";
	}
}

var textBlob = new Blob([words], {type:'text/plain'});

var downloadLink = document.createElement("a");
downloadLink.download = 'words.txt';
downloadLink.innerHTML = 'Download words';

downloadLink.href = window.URL.createObjectURL(textBlob);
document.body.appendChild(downloadLink);

downloadLink.click();
