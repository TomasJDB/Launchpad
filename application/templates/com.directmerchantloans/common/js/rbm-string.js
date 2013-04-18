/**
 * Additional string manipulation routines
 * 
 * @author Christopher Koning <ckoning@realbrightmedia.com>
 */
// Define trim for IE (suck it windows)
if(typeof String.prototype.trim !== 'function') {
  String.prototype.trim = function() {
    return this.replace(/^\s+|\s+$/g, '');
  }
}
// Define ucwords for javascript
if( typeof String.prototype.ucwords !== 'function') {
  String.prototype.ucwords = function() {
      var output = '';
      var parts = this.split(' ');
      for( var part in parts ) {
          output += parts[part].charAt(0).toUpperCase() + parts[part].substring(1,parts[part].length) + ' ';
      }
      return output.substring(0,output.length-1);
  }
}
// Capitalize the first letter of a string
if( typeof String.prototype.capitalize !== 'function') {
    String.prototype.capitalize = function() {
        return this.charAt(0).toUpperCase() + this.slice(1);
    }
}