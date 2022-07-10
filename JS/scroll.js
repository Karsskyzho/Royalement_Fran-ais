export const API = () => {
    const ratio = .6;
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: ratio,
    }

    const handleIntersect = (entries, observer) => {
        entries.forEach(function (entry) {
            if (entry.intersectionRatio > ratio) {
                entry.target.classList.add('reveal-visible');
                observer.unobserve(entry.target);
            }
        });
    }
    const observer = new IntersectionObserver(handleIntersect, options);
    document.querySelectorAll('.reveal').forEach(function (revealBoucle) {
        observer.observe(revealBoucle);
    });
}

export const removeClass = () => {
    document.querySelectorAll('.reveal').forEach(function (revealBoucle) {
        revealBoucle.classList.remove('reveal');
    });
}
