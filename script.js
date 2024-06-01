function sortAZ() {
    let list = document.getElementById('itemList');
    let items = Array.from(list.getElementsByTagName('li'));
    items.sort((a, b) => a.textContent.localeCompare(b.textContent));

    while (list.firstChild) {
      list.removeChild(list.firstChild);
    }

    items.forEach(item => list.appendChild(item));
  }

  function sortZA() {
    let list = document.getElementById('itemList');
    let items = Array.from(list.getElementsByTagName('li'));
    items.sort((a, b) => b.textContent.localeCompare(a.textContent));

    while (list.firstChild) {
      list.removeChild(list.firstChild);
    }

    items.forEach(item => list.appendChild(item));
  }

  function groupByLetter() {
    let list = document.getElementById('itemList');
    let items = Array.from(list.getElementsByTagName('li'));
    let grouped = {};

    items.forEach(item => {
      let letter = item.textContent.charAt(0).toUpperCase();
      if (!grouped[letter]) {
        grouped[letter] = [];
      }
      grouped[letter].push(item);
    });

    while (list.firstChild) {
      list.removeChild(list.firstChild);
    }

    Object.keys(grouped).sort().forEach(letter => {
      let header = document.createElement('li');
      header.className = 'list-group-item active';
      header.textContent = letter;
      list.appendChild(header);

      grouped[letter].forEach(item => {
        list.appendChild(item);
      });
    });
  }

  function handleSortAndGroup() {
    const option = document.getElementById('sortOptions').value;

    switch(option) {
      case 'az':
        sortAZ();
        break;
      case 'za':
        sortZA();
        break;
      case 'group':
        groupByLetter();
        break;
      default:
        break;
    }
}

(function(fn) {
	'use strict';
	fn(window.jQuery, window, document);
}(function($, window, document) {
	'use strict';

	$(function() {
		$('.sort-btn').on('click', '[data-sort]', function(event) {
			event.preventDefault();

			var $this = $(this),
				sortDir = 'desc';

			if ($this.data('sort') !== 'asc') {
				sortDir = 'asc';
			}

			$this.data('sort', sortDir).find('.fa').attr('class', 'fa fa-sort-' + sortDir);

			// call sortDesc() or sortAsc() or whathaveyou...
		});
	});
}));

!function(){function t(t,e){for(;(t=t.parentElement)&&!t.classList.contains(e););return t}function e(t){return t=t.replace(/[^\d\.-]/g,""),Number(t)}function n(t){var e=document.createElement("span");return e.innerHTML=t,e.textContent||e.innerText}function r(t,e,n){for(var r=0;r<n.length;r++)r==e?n[e].setAttribute("data-sort-direction",t):n[r].setAttribute("data-sort-direction",0)}function a(t,e){for(var n=t.getElementsByTagName("tbody")[0].getElementsByTagName("tr"),r=0;r<n.length;r++)for(var a=n[r].getElementsByTagName("td"),i=0;i<a.length;i++)a[i].innerHTML=e[r][i]}window.addEventListener("load",function(){for(var i=document.getElementsByClassName("sortable-table"),o=[],s=0;s<i.length;s++)!function(){i[s].setAttribute("data-sort-index",s);for(var d=i[s].getElementsByTagName("tbody")[0].getElementsByTagName("tr"),l=0;l<d.length;l++)for(var g=d[l].getElementsByTagName("td"),c=0;c<g.length;c++)void 0===o[s]&&o.splice(s,0,[]),void 0===o[s][l]&&o[s].splice(l,0,[]),o[s][l].splice(c,0,g[c].innerHTML);for(var u=i[s].getElementsByTagName("thead")[0].getElementsByTagName("tr")[0].getElementsByTagName("th"),m=0;m<u.length;m++)!function(){var s=u[m].classList.contains("numeric-sort");u[m].setAttribute("data-sort-direction",0),u[m].setAttribute("data-sort-index",m),u[m].addEventListener("click",function(){var d=this.getAttribute("data-sort-direction"),l=this.getAttribute("data-sort-index"),g=t(this,"sortable-table").getAttribute("data-sort-index");r(1==d?-1:1,l,u),o[g]=o[g].sort(function(t,r){var a=n(t[l]),i=n(r[l]);return s&&(a=e(a),i=e(i)),a===i?0:1==d?a>i?-1:1:a<i?-1:1}),a(i[g],o[g])})}()}()})}();

