/**
 * Manipulate Visual according to site requirements
 */
visualConfiguration.jsPreExecution = function(){
    // VisualGames reference
    var visualRef = this;

    // Add style class to Modal element
    var modal = visualRef.getResourceElement('modalElement');
    modal[0].classList.add('game__wrapp');

    // Modify references to match re-design markup
    visualRef.iconLightboxExpand = 'expand';
    visualRef.iconLightboxCompress = 'compress';
}