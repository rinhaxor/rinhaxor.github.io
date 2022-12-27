
var limit = 100, // Max number of stars
  body = document;
loop = {
  //initilizeing
  start: function() {
    for (var i = 0; i <= limit; i++) {
      var star = this.newStar();
      star.style.top = this.rand() * 100 + '%';
      star.style.left = this.rand() * 100 + '%';
      star.style.webkitAnimationDelay = this.rand() + 's';
      star.style.mozAnimationDelay = this.rand() + 's';
      body.getElementById("stars").appendChild(star);

      var bigstar = this.newBigStar();
      bigstar.style.top = this.rand() * 100 + '%';
      bigstar.style.left = this.rand() * 100 + '%';
      bigstar.style.webkitAnimationDelay = this.rand() + 's';
      bigstar.style.mozAnimationDelay = this.rand() + 's';
      body.getElementById("stars").appendChild(bigstar);
    }
  },
  //to get random number
  rand: function() {
    return Math.random();
  },
  //createing html dom for star
  newStar: function() {
    var d = document.createElement('div');
    d.innerHTML =
      '<div class="star"><div class="star-bottom"></div></div>';
    return d.firstChild;
  },
  newBigStar: function() {
    var d2 = document.createElement('div');
    d2.innerHTML =
    '<div class="bigstar"><div class="bigstar-bottom"></div></div>';
    return d2.firstChild
  },
};
loop.start();