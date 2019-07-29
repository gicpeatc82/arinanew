TweenMax.to("#logo", 1 {x:100, onComplete:tweenComplete});

function tweenComplete() {
  console.log("the tween is complete");
}