import colors from "vuetify/es5/util/colors";

export default {
  breakpoint: {
    thresholds: {
      xs: 340,
      sm: 540,
      md: 960,
      lg: 1300,
    },
    scrollBarWidth: 24,
  },
  icons: {},
  lang: {},
  theme: {
    dark: false,
    options: { customProperties: true },
    themes: {
      light: {
        anchor: "#000000",
        primary: colors.blue.darken2,
        accent: colors.grey.darken3,
        secondary: colors.amber.darken3,
        info: colors.teal.lighten1,
        warning: colors.amber.base,
        error: colors.deepOrange.accent4,
        success: colors.green.accent3,
        main_green: "#98CA33",
        main_blue: "#236AB8",
        main_black_blue: "#091D34",
        main_white: "#FFFFFF",
        main_gray: '#787885',
        main_black: '#000',
      }
    }
  }
}
