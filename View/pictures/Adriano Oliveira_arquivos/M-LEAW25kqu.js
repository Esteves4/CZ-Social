/*!CK:3391258924!*//*1457661941,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["\/cVr6"]); }

__d('NotificationImpressions',['AsyncSignal','NotificationTokens','URI'],function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();var h='/ajax/notifications/impression.php';function i(j,k){var l={ref:k};c('NotificationTokens').untokenizeIDs(j).forEach(function(m,n){l['alert_ids['+n+']']=m;});new (c('AsyncSignal'))(new (c('URI'))(h).getQualifiedURI().toString(),l).send();}f.exports={log:i};},null);