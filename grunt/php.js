// Run a local server
module.exports = {
  server: {
    options: {
      port: 8788,
      hostname: '<%=ip%>',
      base: require('path').resolve('./public_html/'),
      livereload: 35731,
      open: true,
      directives: {
        'error_log': require('path').resolve('error.log')
      },
      env: {
        DEV_IP: '<%=ip%>'
      }
    }
  }
};
