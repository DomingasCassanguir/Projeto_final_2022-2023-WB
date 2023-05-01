wow = new WOW(
  {
    animateClass: 'animated',
    offset: 100,
    callback: function (box) {
      console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
    }
  }
);

wow.init();

document.getElementById('mais').onclick = function () {

  var cont = document.getElementById("cont");

  var section = document.createElement('section');
  section.className = 'section--purple wow fadeInDown';
  this.parentNode.insertBefore(section, this);

  for (let i = 0; i < 20; i++) {
    var h1 = document.createElement('h1');
    h1.className = 'section--purple wow fadeInDown';
    h1.innerHTML = "Olá mundo " + cont.value + "." + i;
    this.parentNode.insertBefore(h1, this);
  }
  cont.value = Number(cont.value) + 1;
};