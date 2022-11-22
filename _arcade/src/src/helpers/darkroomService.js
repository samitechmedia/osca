const assetWidth = 255;
const assetHeight = 191;
const imageFallback = '/images/games/visual/image_not_found.png';

export default class DarkroomService {
  constructor(gameData) {
    this.gameData = gameData;
  }

  generateLink() {
    const connectionData = process.env;

    const logo = this.gameData.images.find(image =>
      image.tags.includes('logo')
    );

    if (logo) {
      return `${connectionData.VUE_APP_DARKROOM_IMAGES}/custom/${logo.hash}/?resize=${assetWidth},${assetHeight}`;
    }

    return imageFallback;
  }
}
