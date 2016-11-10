// Responsive Tables
var tables = document.getElementsByTagName('table');
for (i=0;i<tables.length;i++){
  var headers = tables[i].getElementsByTagName('th'),
      rows = tables[i].getElementsByTagName('tr'),
      header = [];
  if (tables[i].getAttribute('data-table') == undefined) {
    tables[i].setAttribute('data-table',i)
  }
  if (tables[i].getAttribute('data-table-theme') == undefined) {
    tables[i].setAttribute('data-table-theme','default')
  }
  for (h=0;h<headers.length;h++){
    header.push(headers[h].innerHTML);
  }
  for (r=0;r<rows.length;r++){
    var cells = rows[r].getElementsByTagName('td');
    for (c=0;c<cells.length;c++){
      if (cells[c].getAttribute('data-header') == undefined && header[c] !== undefined) {
        cells[c].setAttribute('data-header',header[c]);
      }
    }
  }
}

// Table Button Demo Functionality
scanButtons();
function scanButtons() {
  var buttons = document.querySelectorAll('[data-delete]');
  for (i=0;i<buttons.length;i++){
    buttons[i].addEventListener('click',remove);
  }
}
function view(id){
  var link = document.createElement('a'),
      timestamp = Date.now();
  link.id = timestamp;
  link.href = 'http://example.com/' + id; // Link to view newsletter
  link.setAttribute('target','_blank');
  link.style.cssText = 'position:absolute;right:-10%;bottom:-10%;';
  document.body.appendChild(link);
  document.getElementById(timestamp).dispatchEvent(new MouseEvent('click'));
  document.getElementById(timestamp).parentElement.removeChild(document.getElementById(timestamp));
}
function edit(id){
  var link = document.createElement('a'),
      timestamp = Date.now();
  link.id = timestamp;
  link.href = 'http://example.com/' + id + '?edit'; // Link to edit newsletter
  link.setAttribute('target','_blank');
  link.style.cssText = 'position:absolute;right:-10%;bottom:-10%;';
  document.body.appendChild(link);
  document.getElementById(timestamp).dispatchEvent(new MouseEvent('click'));
  document.getElementById(timestamp).parentElement.removeChild(document.getElementById(timestamp));
}
function duplicate(id){
  var clone = document.getElementById(id).cloneNode(true),
      timestamp = Date.now();
  clone.id+='_'+timestamp;
  document.getElementById(id).parentNode.appendChild(clone);
  // Also clone the newsletter on the backend somewhere around here
  clone.querySelectorAll('[data-delete]')[0].addEventListener('click',remove);
  var orig = clone.style.background;
  clone.style.background = 'lightyellow';
  clone.style.transition = 'background 2s ease-in-out';
  setTimeout(function(){clone.style.background=orig},1000)
  setTimeout(function(){clone.style.transition=''},4000)
}
function remove(){
  // Remove the newsletter from the backend somewhere around here
  this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
}