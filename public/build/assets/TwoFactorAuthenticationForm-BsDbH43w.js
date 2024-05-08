import{Q as E,r as f,T as H,j as M,p as N,o as e,c as _,w as t,e as c,d as o,a as r,g as s,b as n,u as x,q as Q,F as O,f as Y,t as D,n as w,O as S}from"./app-nxIOcz4V.js";import{_ as P}from"./Modal-D6pfAxR4.js";import{_ as v}from"./ConfirmsPassword-DiBMgGvG.js";import{_ as j}from"./DangerButton-DXaZgXiI.js";import{_ as z,a as G}from"./TextInput-B9xwYQTa.js";import{_ as U}from"./InputLabel-DUlP2g4Y.js";import{_ as A}from"./PrimaryButton-BKWiHy7Z.js";import{_ as k}from"./SecondaryButton-BUXHDnlH.js";import"./SectionTitle-BcX5zrG_.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";import"./DialogModal-DXoKqNq0.js";const W={key:0,class:"text-lg font-medium text-gray-900"},I={key:1,class:"text-lg font-medium text-gray-900"},J={key:2,class:"text-lg font-medium text-gray-900"},X=r("div",{class:"mt-3 max-w-xl text-sm text-gray-600"},[r("p",null," When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application. ")],-1),Z={key:3},ee={key:0},te={class:"mt-4 max-w-xl text-sm text-gray-600"},oe={key:0,class:"font-semibold"},ae={key:1},se=["innerHTML"],ne={key:0,class:"mt-4 max-w-xl text-sm text-gray-600"},re={class:"font-semibold"},le=["innerHTML"],ce={key:1,class:"mt-4"},ie={key:1},ue=r("div",{class:"mt-4 max-w-xl text-sm text-gray-600"},[r("p",{class:"font-semibold"}," Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost. ")],-1),de={class:"grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg"},me={class:"mt-5"},fe={key:0},_e={key:1},Fe={__name:"TwoFactorAuthenticationForm",props:{requiresConfirmation:Boolean},setup($){const R=$,V=E(),i=f(!1),a=f(!1),u=f(!1),p=f(null),y=f(null),h=f([]),d=H({code:""}),m=M(()=>{var l;return!i.value&&((l=V.props.auth.user)==null?void 0:l.two_factor_enabled)});N(m,()=>{m.value||(d.reset(),d.clearErrors())});const B=()=>{i.value=!0,S.post(route("two-factor.enable"),{},{preserveScroll:!0,onSuccess:()=>Promise.all([K(),q(),b()]),onFinish:()=>{i.value=!1,a.value=R.requiresConfirmation}})},K=()=>axios.get(route("two-factor.qr-code")).then(l=>{p.value=l.data.svg}),q=()=>axios.get(route("two-factor.secret-key")).then(l=>{y.value=l.data.secretKey}),b=()=>axios.get(route("two-factor.recovery-codes")).then(l=>{h.value=l.data}),C=()=>{d.post(route("two-factor.confirm"),{errorBag:"confirmTwoFactorAuthentication",preserveScroll:!0,preserveState:!0,onSuccess:()=>{a.value=!1,p.value=null,y.value=null}})},L=()=>{axios.post(route("two-factor.recovery-codes")).then(()=>b())},T=()=>{u.value=!0,S.delete(route("two-factor.disable"),{preserveScroll:!0,onSuccess:()=>{u.value=!1,a.value=!1}})};return(l,F)=>(e(),_(P,null,{title:t(()=>[c(" Two Factor Authentication ")]),description:t(()=>[c(" Add additional security to your account using two factor authentication. ")]),content:t(()=>[m.value&&!a.value?(e(),o("h3",W," You have enabled two factor authentication. ")):m.value&&a.value?(e(),o("h3",I," Finish enabling two factor authentication. ")):(e(),o("h3",J," You have not enabled two factor authentication. ")),X,m.value?(e(),o("div",Z,[p.value?(e(),o("div",ee,[r("div",te,[a.value?(e(),o("p",oe," To finish enabling two factor authentication, scan the following QR code using your phone's authenticator application or enter the setup key and provide the generated OTP code. ")):(e(),o("p",ae," Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application or enter the setup key. "))]),r("div",{class:"mt-4 p-2 inline-block bg-white",innerHTML:p.value},null,8,se),y.value?(e(),o("div",ne,[r("p",re,[c(" Setup Key: "),r("span",{innerHTML:y.value},null,8,le)])])):s("",!0),a.value?(e(),o("div",ce,[n(U,{for:"code",value:"Code"}),n(z,{id:"code",modelValue:x(d).code,"onUpdate:modelValue":F[0]||(F[0]=g=>x(d).code=g),type:"text",name:"code",class:"block mt-1 w-1/2",inputmode:"numeric",autofocus:"",autocomplete:"one-time-code",onKeyup:Q(C,["enter"])},null,8,["modelValue"]),n(G,{message:x(d).errors.code,class:"mt-2"},null,8,["message"])])):s("",!0)])):s("",!0),h.value.length>0&&!a.value?(e(),o("div",ie,[ue,r("div",de,[(e(!0),o(O,null,Y(h.value,g=>(e(),o("div",{key:g},D(g),1))),128))])])):s("",!0)])):s("",!0),r("div",me,[m.value?(e(),o("div",_e,[n(v,{onConfirmed:C},{default:t(()=>[a.value?(e(),_(A,{key:0,type:"button",class:w(["me-3",{"opacity-25":i.value}]),disabled:i.value},{default:t(()=>[c(" Confirm ")]),_:1},8,["class","disabled"])):s("",!0)]),_:1}),n(v,{onConfirmed:L},{default:t(()=>[h.value.length>0&&!a.value?(e(),_(k,{key:0,class:"me-3"},{default:t(()=>[c(" Regenerate Recovery Codes ")]),_:1})):s("",!0)]),_:1}),n(v,{onConfirmed:b},{default:t(()=>[h.value.length===0&&!a.value?(e(),_(k,{key:0,class:"me-3"},{default:t(()=>[c(" Show Recovery Codes ")]),_:1})):s("",!0)]),_:1}),n(v,{onConfirmed:T},{default:t(()=>[a.value?(e(),_(k,{key:0,class:w({"opacity-25":u.value}),disabled:u.value},{default:t(()=>[c(" Cancel ")]),_:1},8,["class","disabled"])):s("",!0)]),_:1}),n(v,{onConfirmed:T},{default:t(()=>[a.value?s("",!0):(e(),_(j,{key:0,class:w({"opacity-25":u.value}),disabled:u.value},{default:t(()=>[c(" Disable ")]),_:1},8,["class","disabled"]))]),_:1})])):(e(),o("div",fe,[n(v,{onConfirmed:B},{default:t(()=>[n(A,{type:"button",class:w({"opacity-25":i.value}),disabled:i.value},{default:t(()=>[c(" Enable ")]),_:1},8,["class","disabled"])]),_:1})]))])]),_:1}))}};export{Fe as default};
