export const TimestampToDate = (timestamp) => {
    return new Date(timestamp).toISOString().split('T')[0].split('-').join('/');
}