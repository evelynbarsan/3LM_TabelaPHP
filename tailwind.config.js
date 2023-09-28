/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './pages/**/*.{html,js}','./components/**/*.{html,js}',
  ],
  theme: {
    extend: {
      colors: {
          laranja_1:'#f38f32',
          laranja_2:'#f39200',
          laranja_3:'#ce8414',
          cinzaClaro:'#efefef',
          cinza:'#878787',
          grafite:'#1d1d1b',
          verde:'#13a538',
      },
      spacing:{
        '325':'325px',
        '450':'450px',
        '675':'675px',
      },
      gridRowStart:{
        '8':'8',
        '9':'9',
        '10':'10',
        '11':'11',
        '12':'12',
      },
      gridTemplateRows:{
        '12': 'repeat(12, minmax(0, 1fr))',
        '20': 'repeat(20, minmax(0, 1fr))',
      }
    },
  },
  plugins: [],
}

