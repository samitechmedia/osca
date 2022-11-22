import Vue from 'vue';
import Styles from '../themes/red/index.scss';

// Adds SCSS variables as they are defined
const sassOptions = {
  raw: Styles,
};

// Creates this.$sass.breakpoints field acccessbile to components
const breakpoints = {};
Object.keys(Styles)
  .filter(key => key.includes('breakpoints-'))
  .forEach(key => {
    const breakpointName = key.replace('breakpoints-', '');
    breakpoints[breakpointName] = Styles[key];
  });
sassOptions.breakpoints = breakpoints;

// Creates this.$sass.viewportState field accessible to components
const vm = new Vue({
  data: {
    currentState: [],
    orientation: null,
  },
});

const currentState = vm.currentState;

const globalBreakpoints = Object.keys(breakpoints);
const globalBreakpointsDesc = globalBreakpoints.reverse();
const mqls = [
  ...globalBreakpoints.map(name => window.matchMedia(breakpoints[name])),
];

globalBreakpointsDesc.forEach(name => {
  currentState.push({
    name,
    media: breakpoints[name],
    matches: null,
  });
});

mqls.forEach(mql => {
  const checkState = mq => {
    const ref = vm.currentState.find(breakpointDefinition => {
      return breakpointDefinition.media === mq.media;
    });

    ref.matches = mq.matches;
  };

  checkState(mql);
  mql.addListener(checkState);
});

Object.defineProperty(sassOptions, 'viewportState', {
  get() {
    return currentState;
  },
});

// Returns biggest active viewport
Object.defineProperty(sassOptions, 'currentViewport', {
  get() {
    return currentState.find(mq => mq.matches);
  },
});

// Creates this.$sass.currentOrientation field acccessbile to components
const orientations = {};
Object.keys(Styles)
  .filter(key => key.includes('orientation-'))
  .forEach(key => {
    const orientationName = key.replace('orientation-', '');
    orientations[orientationName] = Styles[key];
  });

const orientationMqls = [
  ...Object.keys(orientations).map(name =>
    window.matchMedia(orientations[name]),
  ),
];

orientationMqls.forEach(mql => {
  const checkOrientation = mq => {
    if (mq.matches) {
      const name = mq.media.includes('portrait') ? 'portrait' : 'landscape';
      vm.orientation = name;
    }
  };

  checkOrientation(mql);
  mql.addListener(checkOrientation);
});

// Returns biggest active viewport
Object.defineProperty(sassOptions, 'currentOrientation', {
  get() {
    return vm.orientation;
  },
});

Vue.mixin({
  computed: {
    $sass() {
      return sassOptions;
    },
  },
});
