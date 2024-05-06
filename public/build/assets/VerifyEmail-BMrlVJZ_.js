import{T as g,j as p,o as a,d as l,b as e,u as t,Z as h,w as o,g as _,a as s,n as y,e as n,i as u,h as v,F as x}from"./app-BU2BsgmQ.js";import{A as b}from"./AuthenticationCard-Bcx5OvVF.js";import{_ as w}from"./AuthenticationCardLogo-BYJlJe3p.js";import{_ as k}from"./PrimaryButton-DatUyx5d.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const V=s("div",{class:"mb-4 text-sm text-gray-600"}," Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1),E={key:0,class:"mb-4 font-medium text-sm text-green-600"},B={class:"mt-4 flex items-center justify-between"},L={__name:"VerifyEmail",props:{status:String},setup(c){const d=c,i=g({}),f=()=>{i.post(route("verification.send"))},m=p(()=>d.status==="verification-link-sent");return(r,C)=>(a(),l(x,null,[e(t(h),{title:"Email Verification"}),e(b,null,{logo:o(()=>[e(w)]),default:o(()=>[V,m.value?(a(),l("div",E," A new verification link has been sent to the email address you provided in your profile settings. ")):_("",!0),s("form",{onSubmit:v(f,["prevent"])},[s("div",B,[e(k,{class:y({"opacity-25":t(i).processing}),disabled:t(i).processing},{default:o(()=>[n(" Resend Verification Email ")]),_:1},8,["class","disabled"]),s("div",null,[e(t(u),{href:r.route("profile.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:o(()=>[n(" Edit Profile")]),_:1},8,["href"]),e(t(u),{href:r.route("logout"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2"},{default:o(()=>[n(" Log Out ")]),_:1},8,["href"])])])],32)]),_:1})],64))}};export{L as default};
