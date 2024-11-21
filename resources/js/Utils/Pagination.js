function propsAsString(obj) {
    return Object.keys(obj).map(function(k) { return k + "=" + obj[k] }).join("&")
}
const useQueryParams = (url, data = null) => {
    if(!data || url == null) return url;
    delete data.page;
    return url + '&' + propsAsString(data) ?? '';
}

export default {
    propsAsString,
    useQueryParams
}