import{_ as p}from"./AppLayout-B50wRzNA.js";import c from"./DeleteUserForm-CHQd5SVN.js";import l from"./LogoutOtherBrowserSessionsForm-BnjnpEnZ.js";import{S as s}from"./SectionBorder-Dwga4apR.js";import f from"./TwoFactorAuthenticationForm-aeUq9hV-.js";import u from"./UpdatePasswordForm-QWWOB957.js";import d from"./UpdateProfileInformationForm-CTBDdd1h.js";import{o,c as _,w as n,a as i,d as r,b as t,g as a,F as h}from"./app-BU2BsgmQ.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";import"./Modal-tw3qj8NZ.js";import"./SectionTitle-Cg8Fuz0B.js";import"./DangerButton-DVex913n.js";import"./DialogModal-Dx56ziOZ.js";import"./TextInput-Lham_V-y.js";import"./SecondaryButton-CInXkS1q.js";import"./ActionMessage-C-RmQGiX.js";import"./PrimaryButton-DatUyx5d.js";import"./InputLabel-DdGZvKJb.js";import"./FormSection-CVNA0Q1-.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Mi perfil ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},G={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(e,x)=>(o(),_(p,{title:"Mi perfil"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[e.$page.props.jetstream.canUpdateProfileInformation?(o(),r("div",w,[t(d,{user:e.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),e.$page.props.jetstream.canUpdatePassword?(o(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),e.$page.props.jetstream.canManageTwoFactorAuthentication?(o(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),e.$page.props.jetstream.hasAccountDeletionFeatures?(o(),r(h,{key:3},[t(s),t(c,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{G as default};