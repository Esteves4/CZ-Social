/*!CK:2844858521!*//*1457661941,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["Qas4s"]); }

__d('NotificationSound',['Sound'],function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();var h=5000;c('Sound').init(['audio/mpeg']);function i(j){this._soundPath=j;this._lastPlayed=0;}Object.assign(i.prototype,{play:function(j){if(!this._soundPath)return;var k=Date.now();if(k-this._lastPlayed<h)return;this._lastPlayed=k;c('Sound').playOnlyIfImmediate(this._soundPath,j);}});f.exports=i;},null);