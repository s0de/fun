export default class Sticky {
    constructor(options) {
        this.options = options;
        this.options.element = options.element || null;
        this.options.parent = options.parent || 'parent';
        this.options.top = options.top || 0;
        this.options.bottom = options.bottom || 0;
        this.options.width = options.width;
        this.options.dimension = options.dimension || 'top';
        this.options.offset = options.offset||false;
        this.options.fix = options.fixParentHeight||false;
        this.offset = 0;
        this.calc = this.calculation.bind(this);
        this.init();
    }

    init() {
        this.options.element.classList.add('psticky-dimension-' + this.options.dimension);
        window.addEventListener('scroll', this.calc, false);
    }

    calculation() {
        let offsetTop = this.options.element.getBoundingClientRect().top;
        let parentBottomOffset = this.options.parent.getBoundingClientRect().bottom;
        let parentTopOffset = this.options.parent.getBoundingClientRect().top;
        if (offsetTop - this.options.top <= 0) {
            this.setStickyT();
        } else if (offsetTop > 0 ) {
            this.setTopT();
        }
        let bottomOffset = parentBottomOffset - this.options.top - this.options.element.offsetHeight;
        if (bottomOffset < 0) {
             this.setBottomT();
        }
        if (parentTopOffset > 0) {
            this.clean();
        }

    }

    setStickyT() {
        if (! this.options.element.classList.contains('psticky-sticky')) {
            this.clean();
            this.options.element.classList.add('psticky-sticky');
            this.options.element.style.top = `${this.options.top}px`;
            }
    }

    setTopT() {
        if (!this.options.element.classList.contains('psticky-top') && !this.options.element.classList.contains('psticky-sticky')) {
            this.clean();
            this.options.element.classList.add('psticky-top');
        }
    }

    setBottomT() {
        if (!this.options.element.classList.contains('psticky-bottom')) {
            this.clean();
            this.options.element.classList.add('psticky-bottom');
        }
    }

    setStickyB() {
        if (!this.options.element.classList.contains('psticky-sticky')) {
            this.clean();
            this.options.element.classList.add('psticky-sticky');
            this.options.element.style.bottom = this.options.bottom;
        }
    }

    clean() {
        if (this.options.element.classList.contains('psticky-sticky')
            || this.options.element.classList.contains('psticky-bottom')
            || this.options.element.classList.contains('psticky-top')) {
            this.options.element.classList.remove('psticky-sticky');
            this.options.element.classList.remove('psticky-bottom');
            this.options.element.classList.remove('psticky-top');
        }
        this.options.element.style.position = '';
        this.options.element.style.top = '';
        this.options.element.style.bottom = '';
    }

    delete() {
        window.removeEventListener('scroll', this.calc, false);
        this.clean();
    }
}
