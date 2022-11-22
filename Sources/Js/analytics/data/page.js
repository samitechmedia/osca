/**
 * DO NOT EDIT THIS PAGE WITHOUT CONSULTING WITH ANALYTICS SQUAD
 */

const checkPageTagRulesForRules = (pageTagsData, pagePath) => {
    let pageTagsRulesArray = Object.keys(pageTagsData.tagRules);
    let pageTags = {};
    pageTagsRulesArray.some((pageRule) => {
        if (pagePath.startsWith(pageRule) === true) {
            pageTags = pageTagsData.tagRules[pageRule];
            return true;
        }
        return false;
    });
    return pageTags;
};

export const getPageTagsForPage = (pageTagsData, pagePath) => {
    let pageTags = pageTagsData.pageTags[pagePath];
    if (pageTags == null) {
        pageTags = checkPageTagRulesForRules(pageTagsData, pagePath);
    }
    pageTags = pageTags || {};
    return pageTags;
};
