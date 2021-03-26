const player = document.createElement("audio")
player.src = "/assets/ding.mp3"

function play() {
  player.play()
}

export default {
  play
}